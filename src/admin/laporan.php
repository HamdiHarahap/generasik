<?php 
    session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: ../auth/login.php");
    }

    require '../functions/functions.php';
    
    $penjualan = query("SELECT p.nama_produk AS n, COALESCE(COUNT(t.jumlah_produk), 0) AS jp, p.harga_produk AS h, COALESCE(SUM(t.jumlah_produk * p.harga_produk), 0) AS th 
        FROM 
            produk AS p
        LEFT JOIN 
            transaksi AS t ON p.id_produk = t.id_produk 
        LEFT JOIN 
            pelanggan AS pl ON t.id_pelanggan = pl.id_pelanggan 
        GROUP BY 
            p.id_produk")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generasik | Laporan</title>
    <link rel="icon" href="../assets/images/logo-generasik.png">
    <link rel="stylesheet" href="../output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F2F9FE] h-[50rem]">
    <header class="bg-blue-900 w-48 h-screen fixed text-white flex flex-col justify-between py-16 top-0 font-semibold">
        <nav>
            <h2 class="text-center text-xl mb-6">Generasik</h2>
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
                    <a href="./pesanan.php" class="flex gap-2 px-10 py-3">
                        <img src="../assets/icon/customer.svg" alt="logo" class="w-6">
                        Pelanggan
                    </a>
                </li>
                <li class="bg-[#F2F9FE] px-10 py-3 text-black rounded-s-lg">
                    <a href="" class="flex gap-2">
                        <img src="../assets/icon/report-dark.svg" alt="logo" class="w-6">
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
                <h1 class="text-2xl">Laporan</h1>
            </div>
        </aside>
        <section class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
        <h1 class="text-sm font-semibold">Laporan Penjualan</h1>
        <table class="border mr-4 w-full mt-4">
            <tr class="border text-left bg-blue-900 text-white">
                <th class="p-2">No</th>
                <th class="p-2">Nama Produk</th>
                <th class="p-2">Jumlah Terjual</th>
                <th class="p-2">Harga Satuan</th>
                <th class="p-2">Total Harga</th>
            </tr>
            <?php if(empty($penjualan)): ?>
                <tr>
                    <td colspan="5" class="p-2 text-center">Tidak ada data penjualan.</td>
                </tr>
            <?php else: ?>
                <?php $no = 1; ?>
                <?php foreach($penjualan as $pjl): ?>
                    <tr class="border">
                        <td class="p-2"><?= $no; ?></td>
                        <td class="p-2"><?= $pjl["n"]; ?></td>
                        <td class="p-2"><?= $pjl["jp"]; ?></td>
                        <td class="p-2"><?= number_format($pjl["h"], 0, ',', '.') ; ?></td>
                        <td class="p-2"><?= number_format($pjl["th"], 0, ',', '.') ; ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
                <tr class="border font-semibold">
                    <td colspan="2"></td>
                    <td class="p-2">Total: <?= number_format(array_sum(array_column($penjualan, 'jp')), 0, ',', '.') ; ?></td>
                    <td colspan="1"></td>
                    <td class="p-2">Total: <?= number_format(array_sum(array_column($penjualan, 'th')), 0, ',', '.') ; ?></td>
                </tr>
            <?php endif; ?>
        </table>
</section>
    </main>
</body>
</html>
