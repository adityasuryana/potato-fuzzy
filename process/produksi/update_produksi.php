<?php

    require_once('../../connection.php');

    $id = $_POST['id'];
    $semester = $_POST['semester'];
    $tahun = $_POST['tahun'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];

    $query = "UPDATE produksi SET semester='$semester', tahun='$tahun', produk='$produk', jumlah='$jumlah' WHERE id='$id'";

    $result = mysqli_query($conn,$query);

    if($result == true){
        header("location:../../laporan-produksi.php");
    }

?>
