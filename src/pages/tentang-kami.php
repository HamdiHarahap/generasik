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
    <title>Generasik | Tentang Kami</title>
    <link rel="icon" href="../assets/images/logo-generasik.png">
    <link rel="stylesheet" href="../style/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header>
        <nav class="nav font-semibold flex justify-between px-52 items-center fixed bg-white border-b w-[124%] py-4 z-10 white-text max-[520px]:px-6 max-[520px]:flex-col max-[520px]:items-start max-[520px]:justify-center max-[520px]:bg-white max-[520px]:text-black max-[520px]:w-[100vw] max-[520px]:border-b">
            <div class="flex max-[520px]:justify-between max-[520px]:w-full">
                <h1 class="text-4xl font-raleway">Generasik</h1>
                <div>
                    <img src="../assets/icon/menu.svg" alt="" class="menu w-10 min-[520px]:hidden">
                    <img src="../assets/icon/close.svg" alt="" class="close w-10 min-[520px]:hidden hidden">
                </div>
            </div>
            <ul class="list-menu min-[520px]:flex gap-4 max-[520px]:flex-col hidden max-[520px]:mt-5">
                <li><a href="../index.php" class="hover:text-red-600">Beranda</a></li>
                <li><a href="" class="text-red-600">Tentang Kami</a></li>
                <li><a href="./produk/coffee.php" class="hover:text-red-600">Produk</a></li>
                <li><a href="./lokasi.php" class="hover:text-red-600">Toko Kami</a></li>
                <li>
                    <a href="./pages/keranjang.php">Keranjang</a>
                    <?php if(isset($_SESSION["id_produk"])): ?>
                        <sup class="text-red-600"><?= $jumlah_produk; ?></sup>
                    <?php endif;?>
                </li>
                <li>
                    <a href="./pages/produk.php" class="bg-black hover:bg-red-600 text-white px-4 py-2 rounded-lg ml-4 font-lato max-[520px]:m-0">Pesan Sekarang<a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="py-[5rem] flex items-center gap-16 max-[520px]:px-6 max-[520px]:py-24">
            <img src="../assets/images/store.jpg" alt="" class="w-[50rem] max-[520px]:hidden">
            <article class="flex flex-col gap-8">
                <div class="flex items-center gap-5">
                    <div class="w-12 h-[0.15rem] bg-black"></div>
                    <p class="text-xl font-semibold font-lato"><span class="font-normal">About</span> Generasik</p>
                </div>
                <h1 class="font-semibold text-6xl text-red-600 font-raleway">Cerita Kami</h1>
                <p class="text-2xl font-lato">Mari berkenalan dengan kami, mulai dari <br> toko, dan lingkungan</p>
            </article>
        </section>
        <section class="flex px-52 py-24 justify-between items-center max-[520px]:px-6 max-[520px]:flex-col max-[520px]:justify-center max-[520px]:gap-8">
            <article class="flex flex-col gap-6">
                <div class="flex items-center gap-5">
                    <div class="w-12 h-[0.15rem] bg-black"></div>
                    <p class="text-xl font-semibold font-lato"><span class="font-normal">Our</span> Story</p>
                </div>
                <h1 class="text-6xl font-semibold text-red-600 font-raleway">Capture the <br> Essentials</h1>
            </article>
            <article class="w-[35rem] text-xl flex flex-col gap-5 font-lato max-[520px]:w-full">
                <p class="font-lato">Di dunia yang serba cepat, kita mudah kehilangan fokus pada hal yang penting. Generasik hadir sebagai tempat beristirahat, di mana kamu dapat menikmati secangkir kopi yang dibuat dengan dedikasi, menyeimbangkan semangat generasi modern dan apresiasi terhadap momen berharga.</p>
                <p class="font-lato">Kata “Generasik” menggabungkan makna ‘Generasi’ yang melambangkan kemajuan dan ‘Sik’ yang merepresentasikan momen kecil dalam kehidupan. Generasik menginspirasi setiap orang untuk menemukan keindahan hidup, mengisi ulang energi, dan menghargai momen bermakna di tengah kesibukan. Setiap cangkir kopi di Generasik adalah undangan untuk menyegarkan semangat dan memulai kembali dengan perspektif yang baru.</p>
            </article>
        </section>
        <section class="flex px-52 py-20 justify-between items-center max-[520px]:px-6">
            <article class="bg-[url(../assets/images/bg-expert1.jpg)] bg-left-top flex w-full px-5 pt-16 pb-24 justify-around rounded-xl max-[520px]:flex-col max-[520px]:gap-6">
                <div class="">
                    <div class="flex flex-col items-center max-[520px]:gap-6">
                        <h1 class="text-4xl font-semibold min-[520px]:hidden text-center">Muammar Hadi Siregar</h1>
                        <img src="../assets/images/hadi.jpg" alt="images" class="rounded-full w-[23rem] border-white border-4">
                        <div class="bg-white w-fit rounded-lg p-3 text-center absolute mt-[21rem] max-[520px]:hidden">
                            <div class="bg-white w-6 h-6 rotate-45 absolute top-[-0.8rem] left-[3.5rem]"></div>
                            <p class="font-bold font-raleway">Muammar Hadi Siregar</p>
                            <span class="text-slate-400 font-lato">CEO of Generasik</span>
                        </div>
                    </div>
                </div>
                <div class="w-[30rem] flex flex-col gap-6 max-[520px]:w-full"> 
                    <h1 class="text-5xl font-semibold text-red-600 font-raleway">Our Expert Opinion</h1>
                    <p class="text-xl font-lato">Kami di Generasik percaya bahwa kopi berkualitas tinggi bukan hanya tentang rasa, tetapi juga pengalaman yang menghubungkan kita dengan momen yang berarti. Melalui setiap cangkir, kami menciptakan ruang untuk jeda yang berharga, menyatukan semangat generasi modern dengan dedikasi yang melekat dalam proses pembuatan kopi kami. Di Generasik, kami berkomitmen untuk memberikan lebih dari sekadar kopi, tetapi sebuah perjalanan rasa yang menginspirasi dan menguatkan.</p>
                </div>
            </article>
        </section>
    </main>
    <footer class="px-52 pt-20 pb-9 bg-neutral-700 text-white flex flex-col items-center gap-20 max-[520px]:px-6">
        <div class="flex justify-between container max-[520px]:flex-col gap-8">
            <h3 class="text-3xl font-semibold font-raleway">Generasik</h3>
            <div class="flex flex-col gap-3">
                <h3 class="text-2xl font-semibold font-raleway">Links</h3>
                <ul class="flex flex-col gap-2">
                    <li class="flex gap-2">
                        <img src="../assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="../index.php" class="hover:text-blue-800 font-lato">Beranda</a>
                    </li>
                    <li class="flex gap-2">
                        <img src="../assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="" class="hover:text-blue-800 font-lato">Tentang Kami</a>
                    </li>
                    <li class="flex gap-2">
                        <img src="../assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="./produk/coffee.php" class="hover:text-blue-800 font-lato">Produk</a>
                    </li>
                    <li class="flex gap-2">
                        <img src="../assets/icon/arrow.svg" alt="icon" class="w-5">
                        <a href="./keranjang.php" class="hover:text-blue-800 font-lato">Toko Kami</a>
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

    <script src="../js/navgiation.js"></script>
</body>
</html>