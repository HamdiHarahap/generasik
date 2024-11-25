<?php 
    session_start();
    require '../functions/functions.php';

    $totalHarga = 0;

    if (isset($_SESSION["id_produk"])) {
        $id_produk = implode(",", $_SESSION["id_produk"]);
        $produk = query("SELECT * FROM produk WHERE id_produk IN ($id_produk)");

        foreach ($produk as $pdk) {
            $totalHarga += $pdk["harga_produk"];
        }
    } else {
        $produk = [];
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
    <title>Keranjang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header>
        <nav class="bg-white border-b-2 font-semibold flex justify-between px-52 items-center fixed w-full py-4 z-10">
            <h1 class="text-4xl font-raleway">Generasik</h1>
            <ul class="flex gap-4">
                <li><a href="../index.php" class="hover:text-red-600">Beranda</a></li>
                <li><a href="./tentang-kami.php" class="hover:text-red-600">Tentang Kami</a></li>
                <li><a href="./produk/coffee.php" class="hover:text-red-600">Produk</a></li>
                <li><a href="./lokasi.php" class="hover:text-red-600">Toko Kami</a></li>
                <li>
                    <a href="" class="text-red-600">Keranjang</a>
                    <?php if(isset($_SESSION["id_produk"])): ?>
                        <sup class="text-red-600"><?= $jumlah_produk; ?></sup>
                    <?php endif;?>
                </li>
                <li>
                    <a href="./produk.php" class="bg-black hover:bg-red-600 text-white px-4 py-2 rounded-lg ml-4 font-lato">Pesan Sekarang</a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="bg-neutral-200">
        <section class="flex flex-col px-52 py-32 gap-12">
            <h1 class="text-3xl font-semibold">Keranjang</h1>
            <?php if(empty($produk)): ?>
                <div class="flex shadow-lg shadow-slate-400 rounded-lg px-8 py-12 bg-white">
                    <p>Tidak ada sesuatu di keranjang. <a href="./produk.php" class="text-blue-800 font-semibold">Belanja sekarang</a></p>
                </div>
            <?php else: ?>
                <div class="flex shadow-lg shadow-slate-400 rounded-lg bg-white justify-between">
                    <div class="px-8 py-12">
                        <table>
                            <?php foreach($produk as $pdk): ?>
                            <tr>
                                <td class="py-3">
                                    <img src="../assets/images/<?= $pdk["gambar"]; ?>" alt="image" class="w-[10rem] border-2 p-3 rounded-lg">
                                </td>
                                <td class="px-3">
                                    <div class="flex items-center gap-3 justify-between">
                                        <p class="text-lg font-semibold"><?= $pdk["nama_produk"]; ?></p>
                                        <a href="./delete.php?id=<?= $pdk["id_produk"]; ?>">
                                            <img src="../Assets/Icon/trash.svg" alt="icon" class="w-10 bg-red-600 p-2 rounded-lg" onclick="return confirm('Anda Yakin')">
                                        </a>
                                    </div>
                                </td>
                                <td class="px-3">
                                    <input type="number" name="jumlah" value="1" min="1" class="jumlah border-2 outline-none placeholder-neutral-500 rounded-lg py-1 px-3 w-16" onchange="updateHarga(this, <?= $pdk['harga_produk']; ?>, 'harga<?= $pdk['id_produk']; ?>')" data-harga="<?= $pdk['harga_produk']; ?>">
                                </td>
                                <td class="px-3">
                                    <p class="text-xl font-semibold harga-produk" id="harga<?= $pdk['id_produk']; ?>">Rp. <?= number_format($pdk["harga_produk"], 0, ',', '.'); ?></p>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="bg-blue-100 w-[24rem] px-8 py-6 flex flex-col items-center justify-center gap-3">
                        <h2 class="text-3xl font-semibold mb-4">Pesanan</h2>
                        <div class="flex justify-between w-full bg-white border-t-2 border-blue-800 px-6 py-4">
                            <p>Total</p>
                            <p id="totalHarga">Rp <?= number_format($totalHarga, 0, ',', '.'); ?></p>
                        </div>
                        <p class="bg-blue-800 text-white w-full rounded-lg py-3 text-xl font-semibold text-center pOne cursor-pointer">Pesan</p>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    </main>
    <div id="modal" class="w-[30rem] fixed z-10 bg-white top-[4rem] left-1/2 transform -translate-x-1/2 hidden rounded-lg">
        <div class="bg-blue-100 px-12 py-8">
            <div class="">
                <h2 class="text-center mb-8 font-semibold text-3xl">Transaksi</h2>
                <p class="text-xl font-semibold cursor-pointer absolute top-[2rem] right-[2rem] close">X</p>
                <div id="transaksiContent"></div>
                <div class="flex justify-between">
                    <p class="text-xl font-semibold">Total Harga</p>
                    <p class="text-xl font-semibold" id="totalTransaksi">Rp <?= number_format($totalHarga, 0, ',', '.'); ?></p>
                </div>
            </div>
        </div> 
        <form action="simpan.php" method="POST" class="flex flex-col px-12 py-8 gap-2">
            <div class="flex flex-col">
                <label for="" class="text-xl font-semibold">Nama: </label>
                <input type="text" name="nama" class="border-2 border-black rounded-lg px-4 py-1">
            </div>
            <div class="flex flex-col">
                <label for="" class="text-xl font-semibold">Nomor HP: </label>
                <input type="text" name="nomor_hp" class="border-2 border-black rounded-lg px-4 py-1">
            </div>
            <div class="flex flex-col">
                <label for="" class="text-xl font-semibold">Alamat: </label>
                <textarea name="alamat" id="" class="border-2 border-black rounded-lg px-4 py-1 h-[5rem]"></textarea>
            </div>
            <?php foreach ($produk as $pdk): ?>
                <input type="hidden" name="produk[<?= $pdk['id_produk']; ?>][nama]" value="<?= $pdk['nama_produk']; ?>">
                <input type="hidden" name="produk[<?= $pdk['id_produk']; ?>][id_produk]" value="<?= $pdk['id_produk']; ?>">
                <input type="hidden" name="produk[<?= $pdk['id_produk']; ?>][jumlah]" value="1">
                <input type="hidden" name="produk[<?= $pdk['id_produk']; ?>][harga]" value="<?= $pdk['harga_produk']; ?>">
            <?php endforeach; ?>
            <button class="bg-blue-800 text-white w-full rounded-lg py-3 text-xl font-semibold text-center mt-7 cursor-pointer">Pesan</button>
        </form>
    </div>
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

    <script>
        function updateHarga(input, hargaSatuan, hargaId) {
            const jumlah = parseInt(input.value);
            const totalHargaProduk = hargaSatuan * jumlah;
            document.getElementById(hargaId).innerText = `Rp. ${new Intl.NumberFormat('id-ID').format(totalHargaProduk)}`;
            updateTotalHarga();
        }

        function updateTotalHarga() {
            const hargaProdukElems = document.querySelectorAll('.harga-produk');
            let totalHarga = 0;

            hargaProdukElems.forEach(hargaElem => {
                const harga = parseFloat(hargaElem.innerText.replace('Rp. ', '').replace(/\./g, '').replace(',', '.'));
                totalHarga += harga;
            });

            document.getElementById("totalHarga").innerText = `Rp. ${new Intl.NumberFormat('id-ID').format(totalHarga)}`;
        }

        const pOne = document.querySelector('.pOne');
        const close = document.querySelector('.close');
        const modal = document.querySelector('#modal');
        const transaksiContent = document.getElementById('transaksiContent');
        const totalTransaksi = document.getElementById('totalTransaksi');
        const main = document.querySelector('main');
        const footer = document.querySelector('footer');
        const header = document.querySelector('header');

        pOne.addEventListener('click', function() {
            modal.classList.remove('hidden');
            main.classList.add('blur');
            header.classList.add('blur');
            footer.classList.add('blur');

            transaksiContent.innerHTML = ''; 
            const produkElems = document.querySelectorAll('tr'); 
            let total = 0;

            produkElems.forEach(row => {
                const jumlahInput = row.querySelector('.jumlah');
                const hargaElem = row.querySelector('.harga-produk');
                const namaProduk = row.querySelector('.text-lg').innerText;

                const jumlah = parseInt(jumlahInput.value);
                const harga = parseFloat(hargaElem.innerText.replace('Rp. ', '').replace(/\./g, '', '').replace(',', '.'));

                if (jumlah > 0) {
                    const totalHargaProduk = jumlah * harga;
                    total += totalHargaProduk;

                    transaksiContent.innerHTML += `
                        <div class="flex justify-between">
                            <p class="text-xl font-semibold">${namaProduk} (${jumlah})</p>
                            <p class="text-xl font-semibold">Rp. ${new Intl.NumberFormat('id-ID').format(totalHargaProduk)}</p>
                        </div>
                    `;
                }
            });

            totalTransaksi.innerText = `Rp. ${new Intl.NumberFormat('id-ID').format(total)}`;
        });

        close.addEventListener('click', function() {
            modal.classList.add('hidden');
            main.classList.remove('blur');
            header.classList.remove('blur');
            footer.classList.remove('blur');
        });
    </script>
</body>
</html>