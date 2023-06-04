<?php
    // panggil file
    require 'koneksi.php';
    require 'prosescrud.php';    

    $koneksiObj = new Koneksi();
    $koneksi = $koneksiObj->DBConnect();

    $proses = new prosesCrud($koneksi);

    error_reporting(0);

    session_start();
    $id = $_SESSION['ADMIN']['id_login'];
    $sesi = $proses->tampil_data_id('tbl_penghuni','id_login',$id);
?>
