<?php 
    $config = include('config.php');

    $conn = mysqli_connect($config["hostname"], $config["username"], $config["password"], $config["dbname"]);

    function query($query) {
        global $conn;

        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function search($keyword) {
        global $conn;
        $keyword = mysqli_real_escape_string($conn, $keyword);
        $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'";
        return query($query);
    }

    function filter($kategori) {
        global $conn;
        $kategori = mysqli_real_escape_string($conn, $kategori);
        $query = "SELECT * FROM produk WHERE id_kategori = '$kategori'";
        return query($query);
    }
?>