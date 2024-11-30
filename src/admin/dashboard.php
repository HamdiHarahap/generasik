<?php 
    session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: ../auth/login.php");
    }

    require '../functions/functions.php';

    $bulanIni = date('Y-m');
    $pendapatanBulan = query("SELECT COALESCE(SUM(t.jumlah_produk * p.harga_produk), 0) AS total_pendapatan
        FROM transaksi AS t
        JOIN produk AS p ON t.id_produk = p.id_produk
        WHERE DATE_FORMAT(t.tanggal, '%Y-%m') = '$bulanIni'");
    
    $penjualan = query("SELECT DATE_FORMAT(t.tanggal, '%Y-%m') AS bulan_tahun, COUNT(DISTINCT DATE(t.tanggal), t.id_pelanggan) AS jumlah_transaksi
        FROM transaksi AS t
        INNER JOIN pelanggan AS p ON t.id_pelanggan = p.id_pelanggan
        GROUP BY DATE_FORMAT(t.tanggal, '%Y-%m')
        ORDER BY bulan_tahun");

    $produkPenjualan = query("SELECT p.nama_produk AS n, COALESCE(COUNT(t.jumlah_produk), 0) AS jp, p.harga_produk AS h, COALESCE(SUM(t.jumlah_produk * p.harga_produk), 0) AS th 
        FROM 
            produk AS p
        LEFT JOIN 
            transaksi AS t ON p.id_produk = t.id_produk 
        LEFT JOIN 
            pelanggan AS pl ON t.id_pelanggan = pl.id_pelanggan 
        GROUP BY 
            p.id_produk");

    $produkTerbanyak = query("SELECT p.nama_produk AS n, COALESCE(SUM(t.jumlah_produk), 0) AS total_jumlah_terjual 
        FROM produk AS p 
        LEFT JOIN transaksi AS t ON p.id_produk = t.id_produk 
        GROUP BY p.id_produk 
        ORDER BY total_jumlah_terjual DESC LIMIT 1")[0];

    $jumlahTransaksi = query("SELECT p.nama_pelanggan, COUNT(DISTINCT DATE(t.tanggal), t.id_pelanggan) AS jumlah_transaksi
        FROM transaksi AS t
        INNER JOIN pelanggan AS p ON t.id_pelanggan = p.id_pelanggan
        GROUP BY p.nama_pelanggan
        ORDER BY jumlah_transaksi DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generasik | Dashboard</title>
    <link rel="icon" href="../assets/images/logo-generasik.png">
    <link rel="stylesheet" href="../output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>
<body class="bg-[#F2F9FE] h-[50rem]">
    <header class="bg-blue-900 w-48 h-screen fixed text-white flex flex-col justify-between py-16 top-0 font-semibold">
    <nav>
        <ul class="flex flex-col gap-4">
            <li>
                <a href="" class="bg-[#F2F9FE] text-black flex gap-2 px-10 py-3 rounded-s-lg">
                    <img src="../assets/icon/dashboard-dark.svg" alt="logo" class="w-6"> Dashboard
                </a>
            </li>
            <li>
                <a href="./kelola.php" class="flex gap-2 px-10 py-3">
                    <img src="../assets/icon/manage.svg" alt="logo" class="w-6"> Kelola
                </a>
            </li>
            <li>
                <a href="./pesanan.php" class="flex gap-2 px-10 py-3">
                    <img src="../assets/icon/customer.svg" alt="logo" class="w-6"> Pelanggan
                </a>
            </li>
            <li>
                <a href="./laporan.php" class="flex gap-2 px-10 py-3">
                    <img src="../assets/icon/report.svg" alt="logo" class="w-6"> Laporan
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
                <h1 class="text-2xl">Dashboard</h1>
            </div>
        </aside>
        <section class="mr-4 bg-[#FFFFFF] rounded-lg p-5 flex flex-col gap-4">
            <h1 class="text-sm font-semibold mb-4">Ringkasan Penjualan</h1>
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-blue-100 p-4 rounded-lg">
                    <h2 class="font-semibold">Pendapatan Bulan Ini</h2>
                    <p class="text-lg font-bold"> <?= number_format($pendapatanBulan[0]['total_pendapatan'], 0, ',', '.'); ?></p>
                </div>
                <div class="bg-blue-100 p-4 rounded-lg">
                    <h2 class="font-semibold">Total Pendapatan</h2>
                    <p class="text-lg font-bold"><?= number_format(array_sum(array_column($produkPenjualan, 'th')), 0, ',', '.'); ?></p>
                </div>
                <div class="bg-blue-100 p-4 rounded-lg">
                    <h2 class="font-semibold">Jumlah Produk Terjual</h2>
                    <p class="text-lg font-bold"><?= number_format(array_sum(array_column($produkPenjualan, 'jp')), 0, ',', '.'); ?></p>
                </div>
                <div class="bg-blue-100 p-4 rounded-lg">
                    <h2 class="font-semibold">Jumlah Transaksi</h2>
                    <p class="text-lg font-bold"><?= number_format(array_sum(array_column($jumlahTransaksi, 'jumlah_transaksi')), 0, ',', '.'); ?></p>
                </div>
                <div class="bg-blue-100 p-4 rounded-lg">
                    <h2 class="font-semibold">Produk Laris</h2>
                    <p class="text-lg font-bold"><?= $produkTerbanyak["n"]; ?> | <?= $produkTerbanyak["total_jumlah_terjual"]; ?></p>
                </div>
            </div>
        </section>
        <section class="mr-4 bg-[#FFFFFF] rounded-lg p-5 flex gap-[15rem]">
            <div class="w-[20rem]">
                <h1 class="text-sm font-semibold mb-4">Penjualan Semua Produk per Bulan</h1>
                <canvas id="barChart" width="400" height="400"></canvas>
            </div>
            <div>
                <h1 class="text-sm font-semibold mb-4">Penjualan Produk</h1>
                <canvas id="pieChart" width="400" height="400"></canvas>
            </div>
        </section>
    </main>

    <script>
        const penjualan = <?= json_encode($penjualan); ?>;
        const produk = <?= json_encode($produkPenjualan); ?>;

        const labels = penjualan.map(item => item.bulan_tahun)
        const data = penjualan.map(item => item.jumlah_transaksi)

        const ctx = document.getElementById('barChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Transaksi per Bulan',
                    data: data,
                    backgroundColor: [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'
                    ],
                    hoverOffset: 4,
                    barThickness: 50 
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    title: { display: true, text: 'Jumlah Transaksi per Bulan' }
                },
                scales: {
                    x: {
                        grid: {
                            display: false 
                        }
                    },
                    y: {
                        beginAtZero: true 
                    }
                }
            }
        });

        const produkLabels = produk.map(item => item.n)
        const produkData = produk.map(item => item.jp)

        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const colors = [
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', 
            '#FF9F40', '#FFB1C1', '#4BC0C0', '#FF5733', '#C70039',
            '#900C3F', '#581845', '#FFC300', '#DAF7A6', '#FFC0CB',
            '#FF69B4', '#8A2BE2', '#7FFF00', '#D2691E', '#FF4500'
        ];

        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: produkLabels,
                datasets: [{
                    label: 'Penjualan Produk',
                    data: produkData,
                    backgroundColor: colors.slice(0, produkLabels.length), 
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right', 
                    },
                    title: {
                        display: true,
                        text: 'Penjualan Produk'
                    },
                    datalabels: {
                        color: '#fff', 
                        anchor: 'end', 
                        align: 'start',
                        formatter: (value, context) => {
                            const label = context.chart.data.labels[context.dataIndex];
                            return `${label}: ${value}`
                        },
                    }
                }
            }
        });

    </script>

</body>
</html>
