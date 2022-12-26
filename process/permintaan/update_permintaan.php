<?php

    require_once('../../connection.php');

    $id = $_POST['id'];
    $semester = $_POST['semester'];
    $tahun = $_POST['tahun'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];

    $query = "UPDATE permintaan SET semester='$semester', tahun='$tahun', nama_pemesan='$nama_pemesan', produk='$produk', jumlah='$jumlah' WHERE id='$id'";

    $result = mysqli_query($conn,$query);

    if($result == true){
        header("location:../../laporan-permintaan.php");
    }

?>
