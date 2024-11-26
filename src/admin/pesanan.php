<?php 
    session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: ../auth/login.php");
    }

    require '../functions/functions.php';
    
    $pelanggan = query("SELECT * FROM pelanggan");
    $pesanan = query("SELECT p.nama_pelanggan, pr.nama_produk, t.jumlah_produk, pr.harga_produk, t.tanggal FROM transaksi AS t JOIN produk AS pr ON t.id_produk=pr.id_produk JOIN pelanggan AS p ON t.id_pelanggan=p.id_pelanggan ORDER BY t.tanggal DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F2F9FE] h-[50rem]">
    <header class="bg-blue-900 w-48 h-screen fixed text-white flex flex-col justify-between py-16 top-0 font-semibold">
        <nav>
            <ul class="flex flex-col gap-4">
                <li>
                    <a href="./dashboard.php" class="flex gap-2 px-10 py-3">
                        <img src="../assets/icon/dashboard.svg" alt="logo" class="w-6">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="./kelola.php" class="flex gap-2 px-10 py-3">
                        <img src="../assets/icon/manage.svg" alt="logo" class="w-6">
                        Kelola
                    </a>
                </li>
                <li>
                    <a href="./kelola.php" class="bg-[#F2F9FE] text-black flex gap-2 px-10 py-3">
                        <img src="../assets/icon/customer-dark.svg" alt="logo" class="w-6">
                        Pelanggan
                    </a>
                </li>
                <li class="px-10 py-3">
                    <a href="./laporan.php" class="flex gap-2">
                        <img src="../assets/icon/report.svg" alt="logo" class="w-6">
                        Laporan
                    </a>
                </li>
            </ul>
        </nav>
        <div class="flex gap-2 px-12 py-3">
            <img src="../assets/icon/logout.svg" alt="logo" class="w-6">
            <a href="../auth/logout.php">Logout</a>
        </div>
    </header>
    <main class="ps-52 flex flex-col gap-8 pb-[3rem]">
        <aside class="bg-[#FFFFFF] flex justify-between p-5 items-center rounded-lg mr-4 mt-4">
            <div class="font-semibold">
                <h2 class="text-sm">Menu</h2>
                <h1 class="text-2xl">Pesanan</h1>
            </div>
        </aside>
        <section class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
            <h1 class="text-sm font-semibold">Daftar Pelanggan</h1>
            <table class="border mr-4 w-full mt-4">
                <tr class="border text-left bg-blue-900 text-white">
                    <th class="p-2">No</th>
                    <th class="p-2">Nama</th>
                    <th class="p-2">Alamat</th>
                    <th class="p-2">No Telpon</th>
                </tr>
                <?php  $no = 1 ?>
                <?php foreach($pelanggan as $plg): ?>
                    <tr class="border">
                        <td class="p-2"><?= $no; ?></td>
                        <td class="p-2"><?= $plg["nama_pelanggan"]; ?></td>
                        <td class="p-2"><?= $plg["alamat"]; ?></td>
                        <td class="p-2"><?= $plg["no_telp"]; ?></td>
                    </tr>
                <?php $no++ ?>
                <?php endforeach; ?>
            </table>
        </section>
        <section class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
            <h1 class="text-sm font-semibold">Daftar Pesanan</h1>
            <table class="border mr-4 w-full mt-4">
                <tr class="border text-left bg-blue-900 text-white">
                    <th class="p-2">No</th>
                    <th class="p-2">Nama Pemesan</th>
                    <th class="p-2">Nama Produk</th>
                    <th class="p-2">Jumlah Produk</th>
                    <th class="p-2">Harga</th>
                    <th class="p-2">Tanggal</th>
                </tr>
                <?php  $no = 1 ?>
                <?php foreach($pesanan as $psn): ?>
                    <tr class="border">
                        <td class="p-2"><?= $no; ?></td>
                        <td class="p-2"><?= $psn["nama_pelanggan"]; ?></td>
                        <td class="p-2"><?= $psn["nama_produk"]; ?></td>
                        <td class="p-2"><?= $psn["jumlah_produk"]; ?></td>
                        <td class="p-2"><?= number_format($psn["harga_produk"], 0, ',', '.'); ?></td>
                        <td class="p-2"><?= $psn["tanggal"]; ?></td>
                    </tr>
                <?php $no++ ?>
                <?php endforeach; ?>
            </table>
        </section>
    </main>
</body>
</html>