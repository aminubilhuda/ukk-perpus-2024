<?php
    error_reporting(0);
    session_start();
    $host    = "localhost";
    $db_name = "perpustakaan_aminu";
    $user    = "root";
    $pass    = "";

    $koneksi = mysqli_connect($host, $user, $pass, $db_name) or die("Koneksi Gagal");
?>