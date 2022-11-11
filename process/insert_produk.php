<?php
    require_once('../connection.php');

    $nama_barang = $_POST['nama_barang'];
    $quantity = $_POST['quantity'];


    $sql = "INSERT INTO produk(nama_barang, quantity) VALUES ('$nama_barang','$quantity')";
    $result = $conn->query($sql);

    if ($result) {
        header("location:../data-produk.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>
