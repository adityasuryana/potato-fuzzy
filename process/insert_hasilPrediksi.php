<?php
    require_once('../connection.php');

    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $prediksi = $_POST['prediksi'];

    $sql = "INSERT INTO laporanPrediksi(bulan, tahun, prediksi) VALUES ('$bulan', '$tahun','$prediksi')";
    $result = $conn->query($sql);

    if ($result) {
        header("location:../laporan-fuzzy.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>
