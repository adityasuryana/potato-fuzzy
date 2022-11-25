<?php
    require_once('../connection.php');

    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];

    $sql = "INSERT INTO produksi(bulan, tahun, produk, jumlah) VALUES ('$bulan', '$tahun','$produk','$jumlah')";
    $result = $conn->query($sql);

    if ($result) {
        header("location:../data-produksi.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>
