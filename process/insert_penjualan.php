<?php
    require_once('../connection.php');

    $nama_pemesan = $_POST['nama_pemesan'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];


    $sql = "INSERT INTO penjualan(nama_pemesan, produk, jumlah) VALUES ('$nama_pemesan','$produk','$jumlah')";
    $result = $conn->query($sql);

    if ($result) {
        header("location:../data-penjualan.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>
