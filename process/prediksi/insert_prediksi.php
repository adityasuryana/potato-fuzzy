<?php
    require_once('../../connection.php');

    $prediksiSkr = $_POST['prediksiSkr'];

    $sql = "INSERT INTO prediksi(prediksi) VALUES ('$prediksiSkr')";
    $result = $conn->query($sql);

    if ($result) {
        header("location:../../laporan-fuzzy.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>
