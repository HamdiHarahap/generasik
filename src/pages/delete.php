<?php
    session_start();

    if (isset($_SESSION["id_produk"]) && isset($_GET['id'])) {
        $id_hapus = $_GET['id'];

        $_SESSION["id_produk"] = array_diff($_SESSION["id_produk"], [$id_hapus]);
        $_SESSION["jumlah_produk"]--;

        if (empty($_SESSION["id_produk"])) {
            unset($_SESSION["id_produk"]);
            $_SESSION["jumlah_produk"] = '';
        }
    }

    header("Location: ./keranjang.php"); 
    exit;
?>
