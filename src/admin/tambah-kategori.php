<?php 
    require '../functions/functions.php';

    $kategori = query("SELECT * FROM kategori");

    if(isset($_POST["submit"])) {
        if(tambah_kategori($_POST) > 0) {
            echo "
                <script>
                    alert('Kategori Berhasil Ditambahkan');
                    window.location.href = './kelola.php';
                </script>
            ";  
        }
    }

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
        <div>
            <div class="flex gap-2 px-12 py-3">
                <img src="../assets/icon/back.svg" alt="logo" class="w-6">
                <a href="./kelola.php">Kembali</a>
            </div>
            <div class="flex gap-2 px-12 py-3">
                <img src="../assets/icon/logout.svg" alt="logo" class="w-6">
                <a href="../auth/logout.php">Logout</a>
            </div>
        </div>
    </header>
    <main class="ps-52 flex flex-col gap-8">
        <aside class="bg-[#FFFFFF] flex justify-between p-5 items-center rounded-lg mr-4 mt-4">
            <div class="font-semibold">
                <h2 class="text-sm">Menu</h2>
                <h1 class="text-2xl">Kelola</h1>
            </div>
        </aside>
        <section class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
            <h1 class="text-sm font-semibold mb-6">Tambah Kategori</h1>
            <form action="" method="POST" class="flex flex-col gap-4 items-start" enctype="multipart/form-data">
                <ul class="flex flex-col gap-4">
                    <li class="flex flex-col">
                        <label for="nama">Nama Kategori : </label>
                        <input type="text" name="nama" id="nama" class="px-3 py-2 border-b-2 border-black outline-none w-[30rem]" >
                    </li>
                </ul>
                <button type="submit" name="submit" class="bg-blue-900 rounded-lg px-4 py-2 text-white">Submit</button>
            </form>
        </section>
    </main>

    <script>
        function previewImage() {
            const file = document.querySelector('#gambar').files[0];
            const preview = document.querySelector('#preview');
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                preview.src = reader.result;
            });

            if (file) {
                reader.readAsDataURL(file);
                preview.style.display = 'flex';
            } else {
                preview.src = '';
            }
        }
    </script>
</body>
</html>