<?php
    require_once('../connection.php');

    $tanggal = $_POST['tanggal'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];


    $sql = "INSERT INTO permintaan(tanggal, nama_pemesan, produk, jumlah) VALUES ('$tanggal','$nama_pemesan','$produk','$jumlah')";
    $result = $conn->query($sql);

    if ($result) {
        header("location:../data-permintaan.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>
