<?php 
    $config = include('config.php');

    $conn = mysqli_connect($config["hostname"], $config["username"], $config["password"], $config["dbname"]);

    function query($query) {
        global $conn;

        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function search($keyword) {
        global $conn;
        $keyword = mysqli_real_escape_string($conn, $keyword);
        $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'";
        return query($query);
    }

    function filter($kategori) {
        global $conn;
        $kategori = mysqli_real_escape_string($conn, $kategori);
        $query = "SELECT * FROM produk WHERE id_kategori = '$kategori'";
        return query($query);
    }

    function upload() {
        $fileName = $_FILES["gambar"]["name"];
        $fileTmpName = $_FILES["gambar"]["tmp_name"];
        $fileSize = $_FILES["gambar"]["size"];
        $error = $_FILES["gambar"]["error"];

        if($error === 4) {
            echo "
                <script>
                    alert('Select The Image First');
                </script>
            ";
        }

        $allowedExtension = ['jpg', 'jpeg', 'png'];
        $fileExtension = explode('.', $fileName);
        $fileExtension = strtolower(end($fileExtension));

        if(!in_array($fileExtension, $allowedExtension)) {
            echo "
                <script>
                    alert('What You Uploaded is Not an Image');
                </script>
            ";
            return false;
        }

        if($fileSize >  3145728) {
            echo "<script>
                    alert('Image Size is too Large');
                </script>";
            return false;
        }

        $newName = uniqid();
        $newName .= '.' . $fileExtension;
        move_uploaded_file($fileTmpName, "../assets/images/$newName");
        return $newName;
    }
    

    function tambah_produk($data) {
        global $conn;

        $nama = $data["nama"];
        $keterangan = $data["keterangan"];
        $harga = $data["harga"];
        $kategori = $data["kategori"];

        $image = upload();
        if (!$image) {
            return false;
        }

        $query = "INSERT INTO produk VALUES ('', '$nama', '$keterangan', '$harga', '$kategori' ,'$image', 'available')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function tambah_kategori($data) {
        global $conn;

        $nama = $data["nama"];
        $query = "INSERT INTO kategori VALUES ('', '$nama')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function edit_produk($data) {
        global $conn;

        $id = $data["id"];
        $nama = $data["nama"];
        $keterangan = $data["keterangan"];
        $harga = $data["harga"];
        $kategori = $data["kategori"];
        $gambarLama = $data["gambarLama"];

        if ($_FILES['gambar']['error'] === 4) {
            $image = $gambarLama;
        } else {
            $image = upload();
            if (!$image) {
                return false;
            }
        }

        $query = "UPDATE produk SET
                    nama_produk = '$nama',
                    keterangan_produk = '$keterangan',
                    harga_produk = '$harga',
                    id_kategori = '$kategori',
                    gambar = '$image'
                    WHERE id_produk = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
?>