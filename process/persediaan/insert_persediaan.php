<?php
    require_once('../../connection.php');

    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];


    $sql = "INSERT INTO persediaan(bulan, tahun, nama_pemesan, produk, jumlah) VALUES ('$bulan', '$tahun', '$nama_pemesan','$produk','$jumlah')";
    $result = $conn->query($sql);

    if ($result) {
        header("location:../../data-persediaan.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>
