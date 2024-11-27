<?php 
    session_start();

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
    <title>Generasik | Beranda</title>
    <link rel="icon" href="../src/assets/images/logo-generasik.png">
    <link rel="stylesheet" href="./style/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
</head>
<style>
    .b-border {
        border-bottom-width: 2px;
    }

    .black-text {
        color: #000000;
    }

    .white-text {
        color: #FFFFFF;
    }

    .splide__arrow--prev {
        background: transparent;
        left: 20rem; 
    }

    .splide__arrow--next {
        background: transparent;
        right: 20rem; 
    }

    .navbar-scrolled {
        background-color: #FFFFFF;
        border-bottom: 1px solid #EEEEEE;
        transition: background-color 0.3s ease;
    }
</style>
<body class="bg-white">
    <header>
        <nav class="nav font-semibold flex justify-between px-52 items-center fixed w-full py-4 z-10 white-text">
            <h1 class="text-4xl font-raleway">Generasik</h1>
            <ul class="flex gap-4">
                <li><a href="" class="text-red-600">Beranda</a></li>
                <li><a href="./pages/tentang-kami.php" class="hover:text-red-600">Tentang Kami</a></li>
                <li><a href="./pages/produk/coffee.php" class="hover:text-red-600">Produk</a></li>
                <li><a href="./pages/lokasi.php" class="hover:text-red-600">Toko Kami</a></li>
                <li>
                    <a href="./pages/keranjang.php">Keranjang</a>
                    <?php if(isset($_SESSION["id_produk"])): ?>
                        <sup class="text-red-600"><?= $jumlah_produk; ?></sup>
                    <?php endif;?>
                </li>
                <li>
                    <a href="./pages/produk.php" class="bg-black hover:bg-red-600 text-white px-4 py-2 rounded-lg ml-4 font-lato">Pesan Sekarang</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="flex items-center bg-neutral-700 h-[100vh] relative px-52 py-32 text-white">
            <article class="flex flex-col gap-6">
                <h1 class="text-6xl font-bold font-raleway leading-[4.5rem] text-red-600">Temukan Seni Kopi <br> Yang Sempurna</h1>
                <p class="text-xl font-normal font-lato">rasakan cita rasa yang kaya dan berani dari kopi <br> nikmat kami. dibuat untuk <br> membangkitkan indra Anda dan memulai hari Anda</p>
            </article>
            <img src="./assets/images/home-removebg-preview1.png" alt="" class="w-[27rem] absolute bottom-0 right-52">
        </section>
        <section class="flex flex-col px-52 py-32 items-center text-center gap-12">
            <article class="flex flex-col gap-4">        
                <div class="flex flex-col gap-2">
                    <h1 class="text-4xl font-semibold text bg-center font-raleway">Recommended Coffe</h1>
                    <div class="w-32 bg-red-600 h-1 m-auto"></div>
                </div>
                <p class="text-lg font-semibold text-neutral-400 font-lato">Cicipi kopi pilihan terbaik yang kami rekomendasikan, penuh <br> rasa dan aroma istimewa.</p>
            </article>
            <article class="flex justify-around w-full">
                <div class="flex flex-col items-center text-center">
                    <img src="./assets/images/kopsu.jpg" alt="" class="w-64 rounded-lg">
                    <h2 class="text-xl font-bold mt-6 font-raleway">Kopi Susu Gula Aren</h2>
                    <p class="w-64 font-lato">Rasakan kenikmatan perpaduan kopi robusta yang kuat dengan manisnya gula aren yang khas, menciptakan harmoni rasa yang sempurna.</p>
                </div>
                <div class="flex flex-col items-center text-center">
                    <img src="./assets/images/espresso.jpg" alt="" class="w-64 rounded-lg">
                    <h2 class="text-xl font-bold mt-6 font-raleway">Espresso</h2>
                    <p class="w-64 font-lato">Kopi pekat dengan aroma khas yang dihasilkan dari ekstraksi biji kopi terbaik, sempurna bagi pencinta kopi sejati.</p>
                </div>
                <div class="flex flex-col items-center text-center">
                    <img src="./assets/images/sanger.jpg" alt="" class="w-64 rounded-lg">
                    <h2 class="text-xl font-bold mt-6 font-raleway">Sanger</h2>
                    <p class="w-64 font-lato">Minuman khas Aceh yang memadukan kopi hitam dan susu kental manis, menciptakan rasa lembut dengan aroma kopi yang tetap dominan.</p>
                </div>
                <div class="flex flex-col items-center text-center">
                    <img src="./assets/images/americano.jpg" alt="" class="w-64 rounded-lg">
                    <h2 class="text-xl font-bold mt-6 font-raleway">Americano</h2>
                    <p class="w-64 font-lato">Espresso yang diencerkan dengan air panas, memberikan sensasi rasa kopi yang ringan namun tetap otentik.</p>
                </div>
            </article>
         </section>
         <section class="flex flex-col px-52 py-32 items-center text-center gap-16 bg-fixed bg-[url(./assets/images/bg-menu.jpg)] bg-no-repeat bg-center bg-cover">
            <article class="flex flex-col gap-4">        
                <div class="flex flex-col gap-2">
                    <h1 class="text-4xl font-semibold text bg-center text-white font-raleway">Menu Kami</h1>
                    <div class="w-32 bg-red-600 h-1 m-auto"></div>
                </div>
            </article>
            <article class="flex justify-center gap-6">
                <div class="flex flex-col justify-center items-center bg-white rounded-lg gap-6 px-6 py-10 w-[22rem]">
                    <img src="./assets/images/coffee.jpg" alt="" class="w-44 rounded-full border-4 border-white shadow-lg">
                    <h2 class="text-4xl font-bold mb-4 font-raleway">COFFEE</h2>
                    <div class="flex flex-col gap-8 items-center">
                        <div class="flex flex-col gap-1">
                            <div class="w-24 h-1 bg-black"></div>
                            <div class="w-24 h-1 bg-black"></div>
                        </div>
                        <p class="text-lg font-lato">Aromatik, kaya rasa, menyegarkan hari</p>
                        <a href="./pages/produk/non-coffee.php" class="font-lato hover:text-red-600 hover:font-semibold">Lihat Menu ></a>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center bg-white rounded-lg gap-6 px-6 py-10 w-[22rem]">
                    <img src="./assets/images/matcha-home.jpg" alt="" class="w-44 rounded-full border-4 border-white shadow-lg">
                    <h2 class="text-4xl font-bold mb-4 font-raleway">NON-COFFEE</h2>
                    <div class="flex flex-col gap-8 items-center">
                        <div class="flex flex-col gap-1">
                            <div class="w-24 h-1 bg-black"></div>
                            <div class="w-24 h-1 bg-black"></div>
                        </div>
                        <p class="text-lg font-lato">Segarkan harimu dengan pilihan segar</p>
                        <a href="./pages/produk/non-coffee.php" class="font-lato hover:text-red-600 hover:font-semibold">Lihat Menu ></a>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center bg-white rounded-lg gap-6 px-6 py-10 w-[22rem]">
                    <img src="./assets/images/burger.jpg" alt="" class="w-44 rounded-full border-4 border-white shadow-lg">
                    <h2 class="text-4xl font-bold mb-4 font-raleway">BURGER</h2>
                    <div class="flex flex-col gap-8 items-center">
                        <div class="flex flex-col gap-1">
                            <div class="w-24 h-1 bg-black"></div>
                            <div class="w-24 h-1 bg-black"></div>
                        </div>
                        <p class="text-lg font-lato">Lezat dan ideal untuk makan siang</p>
                        <a href="./pages/produk/non-coffee.php" class="font-lato hover:text-red-600 hover:font-semibold">Lihat Menu ></a>
                    </div>
                </div>
            </article>
         </section>
         <section class="flex flex-col px-52 py-32 items-center text-center gap-16">
            <article class="flex flex-col gap-4">        
                <div class="flex flex-col gap-2">
                    <h1 class="text-4xl font-semibold text bg-center font-raleway">What Customers Say</h1>
                    <div class="w-32 bg-red-600 h-1 m-auto"></div>
                </div>
            </article>
            <article>
                <section class="splide" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="flex flex-col justify-center items-center relative pt-12">
                                    <img src="./assets/images/attar.jpg" alt="images" class="w-24 rounded-full border-4 border-white absolute top-0">
                                    <div class="w-[30rem] bg-black text-white pt-14 pb-8 px-12 flex flex-col items-center rounded-lg">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quam minus cumque obcaecati ad natus repellendus distinctio accusantium, ex a delectus commodi nulla in, provident animi, asperiores tempora rem quibusdam?</p>
                                        <div class="flex gap-2 mt-4">
                                            <img src="./assets/icon/star.svg" alt="" class="w-5">
                                            <img src="./assets/icon/star.svg" alt="" class="w-5">
                                            <img src="./assets/icon/star.svg" alt="" class="w-5">
                                            <img src="./assets/icon/star.svg" alt="" class="w-5">
                                            <img src="./assets/icon/star-empty.svg" alt="" class="w-5">
                                        </div>
                                        <h3 class="font font-semibold text-lg font-raleway">Attar Fari Muntazar</h3>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="flex flex-col justify-center items-center relative pt-12">
                                    <img src="./assets/images/attar.jpg" alt="images" class="w-24 rounded-full border-4 border-white absolute top-0">
                                    <div class="w-[30rem] bg-black text-white pt-14 pb-8 px-12 flex flex-col items-center rounded-lg">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quam minus cumque obcaecati ad natus repellendus distinctio accusantium, ex a delectus commodi nulla in, provident animi, asperiores tempora rem quibusdam?</p>
                                        <div class="flex gap-2 mt-4">
                                            <img src="./assets/icon/star.svg" alt="" class="w-5">
                                            <img src="./assets/icon/star.svg" alt="" class="w-5">
                                            <img src="./assets/icon/star.svg" alt="" class="w-5">
                                            <img src="./assets/icon/star.svg" alt="" class="w-5">
                                            <img src="./assets/icon/star-empty.svg" alt="" class="w-5">
                                        </div>
                                        <h3 class="font font-semibold text-lg font-raleway">Attar Fari Muntazar</h3>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="flex flex-col justify-center items-center relative pt-12">
                                    <img src="./assets/images/attar.jpg" alt="images" class="w-24 rounded-full border-4 border-white absolute top-0">
                                    <div class="w-[30rem] bg-black text-white pt-14 pb-8 px-12 flex flex-col items-center rounded-lg">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quam minus cumque obcaecati ad natus repellendus distinctio accusantium, ex a delectus commodi nulla in, provident animi, asperiores tempora rem quibusdam?</p>
                                        <div class="flex gap-2 mt-4">
                                            <img src="./assets/icon/star.svg" alt="" class="w-5">
                                            <img src="./assets/icon/star.svg" alt="" class="w-5">
                                            <img src="./assets/icon/star.svg" alt="" class="w-5">
                                            <img src="./assets/icon/star.svg" alt="" class="w-5">
                                            <img src="./assets/icon/star-empty.svg" alt="" class="w-5">
                                        </div>
                                        <h3 class="font font-semibold text-lg font-raleway">Attar Fari Muntazar</h3>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
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
                        <img src="./assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="../index.php" class="hover:text-blue-800 font-lato">Beranda</a>
                    </li>
                    <li class="flex gap-2">
                        <img src="./assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="" class="hover:text-blue-800 font-lato">Tentang Kami</a>
                    </li>
                    <li class="flex gap-2">
                        <img src="./assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="./store.php" class="hover:text-blue-800 font-lato">Produk</a>
                    </li>
                    <li class="flex gap-2">
                        <img src="./assets/icon/arrow.svg" alt="icon" class="w-5">
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
                        <img src="./assets/icon/whatsapp.svg" alt="logo" class="w-6"/>
                    </a>
                </div>
            </div>
            <div class="w-[20rem] flex flex-col gap-3">
                <h3 class="text-2xl font-semibold font-raleway">Tentang Kami</h3>
                <p class="font-lato">Generasik adalah kedai kopi yang dibuka pada tahun 2023 di Medan, menyajikan berbagai macam minuman kopi berkualitas dan menciptakan suasana yang nyaman bagi para pelanggan.</p>
                <div class="flex gap-2">
                    <div class="bg-white opacity-70 rounded-full p-1 transition transform hover:opacity-100 hover:scale-110">
                        <a href="https://www.instagram.com/hhmdi_/">
                            <img src="./assets/icon/instagram.svg" alt="logo" class="w-6"/>
                        </a>
                    </div>
                    <div class="bg-white opacity-70 rounded-full p-1 transition transform hover:opacity-100 hover:scale-110">
                        <a href="hamdiharahap2005@gmail.com">
                            <img src="./assets/icon/gmail.svg" alt="logo" class="w-6"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <p class="font-lato">Copyright &copy; Generasik. All Right Reserved</p>
    </footer>

    <script src="./js/main.js"></script>
</body>
</html>