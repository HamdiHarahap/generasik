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
    <title>Generasik | Lokasi</title>
    <link rel="icon" href="../assets/images/logo-generasik.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header>
        <nav class="nav font-semibold flex justify-between px-52 items-center bg-white border-b fixed w-[124%] py-4 z-10 white-text max-[520px]:px-6 max-[520px]:flex-col max-[520px]:items-start max-[520px]:justify-center max-[520px]:bg-white max-[520px]:text-black max-[520px]:w-[100vw] max-[520px]:border-b">
            <div class="flex max-[520px]:justify-between max-[520px]:w-full">
                <h1 class="text-4xl font-raleway">Generasik</h1>
                <div>
                    <img src="../assets/icon/menu.svg" alt="" class="menu w-10 min-[520px]:hidden">
                    <img src="../assets/icon/close.svg" alt="" class="close w-10 min-[520px]:hidden hidden">
                </div>
            </div>
            <ul class="list-menu min-[520px]:flex gap-4 max-[520px]:flex-col hidden max-[520px]:mt-5">
                <li><a href="../index.php" class="hover:text-red-600">Beranda</a></li>
                <li><a href="./tentang-kami.php" class="hover:text-red-600">Tentang Kami</a></li>
                <li><a href="./produk/coffee.php" class="hover:text-red-600">Produk</a></li>
                <li><a href="" class="text-red-600">Toko Kami</a></li>
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
    <main class="bg-neutral-200">
        <section class="flex flex-col px-52 py-32 gap-12 max-[520px]:px-6">
            <h1 class="text-3xl font-semibold">Toko Kami</h1>
            <div class="flex shadow-lg shadow-slate-400 rounded-lg px-4 py-6 justify-around bg-white max-[520px]:flex-col max-[520px]:gap-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.102434351676!2d98.65165682497305!3d3.563887496410322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131d6e3d2b367%3A0xc5edba7e577329d2!2sPoliteknik%20Negeri%20Medan!5e0!3m2!1sid!2sid!4v1730002773039!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-[30rem] h-[23rem] rounded-lg max-[520px]:w-full"></iframe>
                <div class="flex flex-col items-center justify-center gap-4 max-[520px]:gap-8">
                    <div class="flex flex-col items-center justify-center">
                        <img src="../Assets/Icon/location.svg" alt="icon" class="w-8">
                        <h3 class="text-xl font-semibold">Alamat</h3>
                        <p class="text-center">Universitas Sumatera Utara, Jl. Almamater No.1, Padang <br> Bulan, Kec. Medan Baru, Kota Medan, <br> Sumatera Utara 20155</p>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <img src="../Assets/Icon/phone.svg" alt="icon" class="w-8">
                        <h3 class="text-xl font-semibold">Telepon</h3>
                        <p>081260244154</p>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <img src="../Assets/Icon/clock.svg" alt="icon" class="w-8">
                        <h3 class="text-xl font-semibold">Jam Operasional</h3>
                        <p>09:00 - 21:00</p>
                    </div>
                </div>
            </div>
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