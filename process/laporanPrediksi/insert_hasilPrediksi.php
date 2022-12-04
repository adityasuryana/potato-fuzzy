<?php
    require_once('../../connection.php');

    $semester = $_POST['semester'];
    $tahun = $_POST['tahun'];
    $prediksi = $_POST['prediksi'];

    $sql = "INSERT INTO laporanPrediksi(semester, tahun, prediksi) VALUES ('$semester', '$tahun','$prediksi')";
    $result = $conn->query($sql);

    if ($result) {
        header("location:../../laporan-fuzzy.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>
