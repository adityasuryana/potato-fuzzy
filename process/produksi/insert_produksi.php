<?php
    require_once('../../connection.php');

    $semester = $_POST['semester'];
    $tahun = $_POST['tahun'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];

    $sql = "INSERT INTO produksi(semester, tahun, produk, jumlah) VALUES ('$semester', '$tahun','$produk','$jumlah')";
    $result = $conn->query($sql);

    if ($result) {
        header("location:../../data-produksi.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>
