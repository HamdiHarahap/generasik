<?php 
    session_start();
    
    require '../../functions/functions.php';

    $jumlah_produk = '';

    if(isset($_SESSION["id_produk"])) {
        $jumlah_produk = count($_SESSION["id_produk"]);
    }


    $produk = query("SELECT * FROM produk WHERE id_kategori = 3");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <style>
        .splide__arrow--prev {
            background: transparent;
            left: 3rem; 
        }      

        .splide__arrow--next {
            background: transparent;
            right: 3rem;
        }

        .grey {
            color: #B7B7B7;
        }
    </style>
</head>
<body>
    <header>
        <nav class="bg-white border-b-2 font-semibold flex justify-between px-52 items-center fixed w-full py-4 z-10">
            <h1 class="text-4xl font-raleway">Generasik</h1>
            <ul class="flex gap-4">
                <li><a href="../../index.php" class="hover:text-red-600">Beranda</a></li>
                <li><a href="../tentang-kami.php" class="hover:text-red-600">Tentang Kami</a></li>
                <li><a href="" class="text-red-600">Produk</a></li>
                <li><a href="../lokasi.php" class="hover:text-red-600">Toko Kami</a></li>
                <li>
                    <a href="../keranjang.php">Keranjang</a>
                    <?php if(isset($_SESSION["id_produk"])): ?>
                        <sup class="text-red-600"><?= $jumlah_produk; ?></sup>
                    <?php endif;?>
                </li>
                <li>
                    <a href="../produk.php" class="bg-black hover:bg-red-600 text-white px-4 py-2 rounded-lg ml-4 font-lato">Pesan Sekarang</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="bg-neutral-200 px-52 py-32 flex flex-col gap-12">
            <h1 class="text-3xl font-semibold">Produk Kami</h1>
            <article class="bg-white text-black flex w-full px-8 py-20">
                <div class="flex flex-col text-xl font-semibold gap-4">
                    <a href="./coffee.php" class="grey w-[16rem] text-start ps-10 flex gap-2">
                        <img src="../../assets/icon/coffee.svg" alt="" class="w-9 hidden">
                        <img src="../../assets/icon/coffee-grey.svg" alt="" class="w-9">
                        Coffee Series
                    </a>
                    <a href="./non-coffee.php" class="grey w-[16rem] text-start ps-10 flex gap-2">
                        <img src="../../assets/icon/tea.svg" alt="" class="w-9 hidden">
                        <img src="../../assets/icon/tea-grey.svg" alt="" class="w-9">
                        Non-Coffee Series
                    </a>
                    <a href="" class="w-[16rem] text-start ps-10 flex gap-2">
                        <img src="../../assets/icon/burger.svg" alt="" class="w-9">
                        <img src="../../assets/icon/burger-grey.svg" alt="" class="w-9 hidden">
                        Burger
                    </a>
                </div>
                <div class="w-[45rem]">
                    <section class="splide" aria-label="Splide Basic HTML Example">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php foreach($produk as $pdk): ?>
                                    <li class="splide__slide">
                                        <div class="rounded-lg ms-28 px-4 py-6 flex items-center gap-3 w-[20rem]">
                                            <img src="../../assets/images/<?= $pdk["gambar"]; ?>" alt="image" class="w-56 rounded-lg">
                                            <div class="flex flex-col gap-2">
                                                <h1 class="text-4xl font-semibold">Burger Series</h1>
                                                <h4 class="text-xl font-semibold"><?= $pdk["nama_produk"]; ?></h4>
                                                <p class="w-[16rem]"><?= $pdk["keterangan_produk"]; ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </section>
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
                        <img src="../../assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="./index.php" class="hover:text-blue-800 font-lato">Beranda</a>
                    </li>
                    <li class="flex gap-2">
                        <img src="../../assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="" class="hover:text-blue-800 font-lato">Tentang Kami</a>
                    </li>
                    <li class="flex gap-2">
                        <img src="../../assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="./store.php" class="hover:text-blue-800 font-lato">Produk</a>
                    </li>
                    <li class="flex gap-2">
                        <img src="../../assets/icon/arrow.svg" alt="icon" class="w-5">
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
                        <img src="../../assets/icon/whatsapp.svg" alt="logo" class="w-6"/>
                    </a>
                </div>
            </div>
            <div class="w-[20rem] flex flex-col gap-3">
                <h3 class="text-2xl font-semibold font-raleway">Tentang Kami</h3>
                <p class="font-lato">Generasik adalah kedai kopi yang dibuka pada tahun 2023 di Medan, menyajikan berbagai macam minuman kopi berkualitas dan menciptakan suasana yang nyaman bagi para pelanggan.</p>
                <div class="flex gap-2">
                    <div class="bg-white opacity-70 rounded-full p-1 transition transform hover:opacity-100 hover:scale-110">
                        <a href="https://www.instagram.com/hhmdi_/">
                            <img src="../../assets/icon/instagram.svg" alt="logo" class="w-6"/>
                        </a>
                    </div>
                    <div class="bg-white opacity-70 rounded-full p-1 transition transform hover:opacity-100 hover:scale-110">
                        <a href="hamdiharahap2005@gmail.com">
                            <img src="../../assets/icon/gmail.svg" alt="logo" class="w-6"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <p class="font-lato">Copyright &copy; Generasik. All Right Reserved</p>
    </footer>

    <script src="../../js/main.js"></script>
</body>
</html>