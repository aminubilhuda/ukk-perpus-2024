<?php
    error_reporting(0);
    
    $page = $_GET['page'];

    if ($page == ""){
        // kalo page kosong maka defaultnya memangil home.php
        include "home.php";

    } else if ($page == "buku"){
        include "buku.php";
        
    } else if ($page == "kategori"){
        include "kategori.php";
    }

    else if ($page == "ulasan") {
        include "ulasan.php";
    }

    else if ($page == "peminjaman") {
        include "peminjaman.php";
    }
    
    else if ($page == "laporan") {
        include "laporan.php";
    }
?>