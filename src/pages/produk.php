<?php 
    session_start();
    require '../functions/functions.php';

    $produk = query("SELECT * FROM produk");

    if(isset($_POST["cari"])) {
        $produk = search($_POST["keyword"]);
    }

    if (isset($_POST["filter"])) {
        if ($_POST["kategori"] == "") {
            $produk = query("SELECT * FROM produk");
        } else {
            $produk = filter($_POST["kategori"]);
        }
    }

    if(isset($_POST["add"])) {
        $id_produk = $_POST["produk"];

        if (!isset($_SESSION["id_produk"])) {
            $_SESSION["id_produk"] = [];
        }

        array_push($_SESSION["id_produk"], $id_produk);
    }   

    $jumlah_produk = '';

    if(isset($_SESSION["id_produk"])) {
        $jumlah_produk = count($_SESSION["id_produk"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generasik | Pesan</title>
    <link rel="icon" href="../assets/images/logo-generasik.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header>
        <nav class="bg-white border-b-2 font-semibold flex justify-between px-52 items-center fixed w-full py-4 z-10">
            <h1 class="text-4xl font-raleway">Generasik</h1>
            <ul class="flex gap-4 items-center">
                <li><a href="../index.php">Beranda</a></li>
                <li><a href="./tentang-kami.php">Tentang Kami</a></li>
                <li><a href="./produk/coffee.php">Produk</a></li>
                <li><a href="./lokasi.php">Toko Kami</a></li>
                <li>
                    <a href="./keranjang.php">Keranjang</a>
                    <?php if(isset($_SESSION["id_produk"])): ?>
                        <sup class="text-red-600"><?= $jumlah_produk; ?></sup>
                    <?php endif;?>
                </li>
                <li>
                    <a class="bg-zinc-200 text-white px-4 py-2 rounded-lg ml-4 font-lato cursor-pointer">Pesan Sekarang</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="bg-neutral-200 px-52 py-32">
            <article class="flex flex-col items-center gap-14 justify-center bg-white text-black shadow-lg shadow-slate-400 py-8 px-6 rounded-lg">
                <div class="flex gap-8">
                    <form method="POST" class="filter flex items-center justify-center">
                        <select name="kategori" class="w-[15rem] border-2 h-[2.3rem] px-3 rounded-s-lg outline-none">
                            <option value="">Kategori</option>
                            <option value="1">Coffee</option>
                            <option value="2">Non-Coffee</option>
                            <option value="3">Food</option>
                        </select>
                        <button type="submit" name="filter" class="bg-blue-800 text-white h-[2.3rem] flex items-center justify-center w-[4rem] rounded-e-lg">Filter</button>
                    </form>
                    <form method="POST" class="cari flex items-center justify-center">
                        <input type="text" name="keyword" placeholder="Cari Produk" class="outline-none placeholder-neutral-500 w-[18rem] h-[2.3rem] border-2 px-3 rounded-s-lg">
                        <button type="submit" name="cari" class="bg-blue-800 text-white h-[2.3rem] flex items-center justify-center w-[4rem] rounded-e-lg">Cari</button>
                    </form>
                </div>
                <div class="flex flex-wrap justify-center gap-6">
                    <?php foreach($produk as $pdk): ?>
                        <form method="POST">
                            <input type="hidden" name="produk" value="<?= $pdk["id_produk"]; ?>">
                            <div class="rounded-lg px-4 py-6 flex flex-col gap-3 w-[15rem]">
                                <?php if($pdk["is_available"] == 'unavailable'): ?>
                                    <img src="../assets/images/unavailable.png" alt="" class="absolute w-[13rem]">
                                <?php endif; ?>
                                <img src="../assets/images/<?= $pdk["gambar"]; ?>" alt="image" class="w-56 rounded-lg">
                                <div class="w-full h-[0.15rem] bg-black"></div>
                                <h4 class="text-xl font-semibold"><?= $pdk["nama_produk"]; ?></h4>
                                <div class="flex justify-between items-center">
                                    <p class="font-semibold"><?= number_format($pdk["harga_produk"], 0, ',', '.') ; ?></p>
                                    <?php if($pdk["is_available"] == 'unavailable'): ?>
                                        <button type="submit" disabled name="add" class="bg-green-600 rounded-s-lg w-fit cursor-pointer">
                                            <img src="../assets/icon/cart.svg" alt="icon" class="w-10 p-2">
                                        </button>
                                    <?php else: ?>
                                        <button type="submit" name="add" class="bg-green-600 rounded-s-lg w-fit">
                                            <img src="../assets/icon/cart.svg" alt="icon" class="w-10 p-2">
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    <?php endforeach; ?>
                </div>
            </article>
        </section>
    </main>
    <footer class="px-52 pt-20 pb-9 bg-neutral-700 text-white flex flex-col items-center gap-20">
        <div class="flex justify-between container">
            <h3 class="text-3xl font-semibold font-raleway">Generasik</h3>
            <div class="flex flex-col gap-3">
                <h3 class="text-2xl font-semibold font-raleway">Links</h3>
                <ul class="flex flex-col gap-2">
                    <li class="flex gap-2">
                        <img src="../assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="./index.php" class="hover:text-blue-800 font-lato">Beranda</a>
                    </li>
                    <li class="flex gap-2">
                        <img src="../assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="" class="hover:text-blue-800 font-lato">Tentang Kami</a>
                    </li>
                    <li class="flex gap-2">
                        <img src="../assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="./store.php" class="hover:text-blue-800 font-lato">Produk</a>
                    </li>
                    <li class="flex gap-2">
                        <img src="../assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="./cart.php" class="hover:text-blue-800 font-lato">Toko Kami</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col items-start gap-3">
                <h3 class="text-2xl font-semibold font-raleway">Kontak</h3>
                <p class="font-lato">
                    Universitas Sumatera Utara, Jl. Almamater No.1, Padang <br> Bulan, Kec. Medan Baru, Kota Medan, <br> Sumatera Utara 20155
                </p>
                <div class="bg-white opacity-70 rounded-full p-1 transition transform hover:opacity-100 hover:scale-110">
                    <a href="https://wa.me/6281260244154">
                        <img src="../assets/icon/whatsapp.svg" alt="logo" class="w-6"/>
                    </a>
                </div>
            </div>
            <div class="w-[20rem] flex flex-col gap-3">
                <h3 class="text-2xl font-semibold font-raleway">Tentang Kami</h3>
                <p class="font-lato">Generasik adalah kedai kopi yang dibuka pada tahun 2023 di Medan, menyajikan berbagai macam minuman kopi berkualitas dan menciptakan suasana yang nyaman bagi para pelanggan.</p>
                <div class="flex gap-2">
                    <div class="bg-white opacity-70 rounded-full p-1 transition transform hover:opacity-100 hover:scale-110">
                        <a href="https://www.instagram.com/hhmdi_/">
                            <img src="../assets/icon/instagram.svg" alt="logo" class="w-6"/>
                        </a>
                    </div>
                    <div class="bg-white opacity-70 rounded-full p-1 transition transform hover:opacity-100 hover:scale-110">
                        <a href="hamdiharahap2005@gmail.com">
                            <img src="../assets/icon/gmail.svg" alt="logo" class="w-6"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <p class="font-lato">Copyright &copy; Generasik. All Right Reserved</p>
    </footer>

    <script src="../js/main.js"></script>
</body>
</html>