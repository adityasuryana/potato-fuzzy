<?php
    require_once('../../connection.php');

    $semester = $_POST['semester'];
    $tahun = $_POST['tahun'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];


    $sql = "INSERT INTO permintaan(semester, tahun, nama_pemesan, produk, jumlah) VALUES ('$semester', '$tahun', '$nama_pemesan','$produk','$jumlah')";
    $result = $conn->query($sql);

    if ($result) {
        header("location:../../data-permintaan.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>
