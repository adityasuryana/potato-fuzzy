<?php
    require_once('../../connection.php');

    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $sediaMax = $_POST['sediaMax'];
    $sediaMin = $_POST['sediaMin'];
    $mintaMax = $_POST['mintaMax'];
    $mintaMin = $_POST['mintaMin'];
    $prodMax = $_POST['prodMax'];
    $prodMin = $_POST['prodMin'];
    $mintaSkr = $_POST['mintaSkr'];
    $sediaSkr = $_POST['sediaSkr'];


    $sql = "INSERT INTO prediksi(bulan, tahun, sediaMax, sediaMin, mintaMax, mintaMin, prodMax, prodMin, mintaSkr, sediaSkr) VALUES ('$bulan', '$tahun', '$sediaMax', '$sediaMin', '$mintaMax','$mintaMin','$prodMax','$prodMin','$mintaSkr','$sediaSkr')";
    $result = $conn->query($sql);

    if ($result) {
        header("location:../../hasil-fuzzy.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>
