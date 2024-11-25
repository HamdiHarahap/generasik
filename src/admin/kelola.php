<?php 
    session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: ../auth/login.php");
    }   
    require '../functions/functions.php';
    
    $product = query("SELECT p.id_produk, p.nama_produk, p.keterangan_produk, k.nama_kategori, p.harga_produk, p.gambar, p.is_available FROM produk AS p JOIN kategori AS k ON p.id_kategori=k.id_kategori");
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
                <li class="bg-[#F2F9FE] px-10 py-3 text-black">
                    <a href="" class="flex gap-2">
                        <img src="../assets/icon/manage-dark.svg" alt="logo" class="w-6">
                        Kelola
                    </a>
                </li>
                <li>
                    <a href="./pesanan.php" class="flex gap-2 px-10 py-3">
                        <img src="../assets/icon/customer.svg" alt="logo" class="w-6">
                        Pelanggan
                    </a>
                </li>
                <li>
                    <a href="./laporan.php" class="flex gap-2 px-10 py-3">
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
                <h1 class="text-2xl">Laporan</h1>
            </div>
        </aside>
        <section class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
            <h1 class="text-sm font-semibold">Daftar Produk</h1>
            <table class="border mr-4 w-full mt-4">
                <tr class="border text-left bg-blue-900 text-white">
                    <th class="p-2">No</th>
                    <th class="p-2">Nama</th>
                    <th class="p-2">Harga</th>
                    <th class="p-2">Keterangan</th>
                    <th class="p-2">Kategori</th>
                    <th class="p-2">Gambar</th>
                    <th class="p-2">Ketersediaan</th>
                    <th class="p-2">Action</th>
                </tr>
                <?php  $no = 1 ?>
                <?php foreach($product as $pdk): ?>
                    <tr class="border">
                        <td class="p-2"><?= $no; ?></td>
                        <td class="p-2"><?= $pdk["nama_produk"]; ?></td>
                        <td class="p-2"><?= number_format($pdk["harga_produk"], 0, ',', '.') ; ?></td>
                        <td class="p-2"><?= $pdk["keterangan_produk"]; ?></td>
                        <td class="p-2"><?= $pdk["nama_kategori"]; ?></td>
                        <td class="p-2"><img src="../assets/images/<?= $pdk["gambar"]; ?>" alt="" class="w-[5rem] rounded-lg"></td>
                        <td class="p-2"><?= $pdk["is_available"] ?></td>
                        <td class="p-2">
                            <div class="flex gap-1">
                                <a href="./edit.php?id_produk=<?= $pdk["id_produk"]; ?>" class="flex items-center justify-center bg-yellow-300 rounded-lg cursor-pointer p-1 w-fit">
                                    <img src="../assets/icon/edit.svg" alt="logo" class="w-6">
                                </a>
                                <a href="./delete.php?id_produk=<?= $pdk["id_produk"]; ?>" onclick="return confirm('Anda Yakin?')" class="flex items-center justify-center bg-red-600 rounded-lg cursor-pointer p-1 w-fit">
                                    <img src="../assets/icon/trash.svg" alt="logo" class="w-6">
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php $no++ ?>
                <?php endforeach; ?>
            </table>
        </section>
        <div class="flex bg-[#FFFFFF] w-fit rounded-full p-3 border-2 border-black fixed right-7 bottom-10">
            <a href="./add.php">
                <img src="../assets/icon/add.svg" alt="logo" class="w-6">
            </a>
        </div>
    </main>
</body>
</html>
