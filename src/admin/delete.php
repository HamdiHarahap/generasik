<?php 
    require '../functions/functions.php';

    if($_GET["id_produk"]) {
        global $conn;
        $id_produk = $_GET["id_produk"];
        $query = "DELETE FROM produk WHERE id_produk = '$id_produk'";
        mysqli_query($conn, $query);
    }

    if($_GET["id_kategori"]) {
        global $conn;
        $id_kategori = $_GET["id_kategori"];
        $query = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";
        mysqli_query($conn, $query);
    }

    header("Location: ./kelola.php");
?>