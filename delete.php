<?php
    include 'koneksi.php';

    if(isset($_GET["negara"])){
        // Prepared statement untuk menghapus data
        $query = $db->prepare("DELETE FROM `corona` WHERE negara=:negara");
        $query->bindParam(":negara", $_GET["negara"]);
        // Jalankan Perintah SQL
        $query->execute();
        // Alihkan ke index.php
        header("location: home.php");
    }
?>
