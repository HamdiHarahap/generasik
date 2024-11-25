<?php 
    session_start();
    require '../functions/functions.php';

    global $conn;

    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $nomor_hp = mysqli_real_escape_string($conn, $_POST['nomor_hp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $produk = $_POST['produk']; 

    $query = "INSERT INTO pelanggan VALUES ('', '$nama', '$alamat', '$nomor_hp')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $id_pelanggan = mysqli_insert_id($conn); 

        foreach ($produk as $item) {
            $id_produk = $item['id_produk']; // Pastikan ini ada di input hidden
            $jumlah = $item['jumlah'];
            $harga = $item['harga'];
            $tanggal = date('Y-m-d');
            // $total_harga = $jumlah * $harga;

            $queryDetail = "INSERT INTO transaksi VALUES ('', '$id_pelanggan', '$id_produk', '$jumlah', '$tanggal')";
            if (!mysqli_query($conn, $queryDetail)) {
                echo "Error: " . mysqli_error($conn);
            }
        }

        unset($_SESSION["id_produk"]);

        echo "
            <script>
                alert('Pesanan berhasil di pesan, tunggu konfirmasi dari toko');
                window.location.href = './keranjang.php';
            </script>
        ";
        exit;
    } else {
        echo "
            <script>
                alert('Pesanan gagal di pesan: " . mysqli_error($conn) . "');
                window.location.href = './keranjang.php';
            </script>
        ";
    }
?>