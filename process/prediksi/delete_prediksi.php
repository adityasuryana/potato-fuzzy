<?php

    require_once('../../connection.php');

    $id = $_GET['id'];

    $query = "DELETE FROM prediksi WHERE id='$id'";

    $result = mysqli_query($conn,$query);

    if($result == true){
        header("location:../../laporan-fuzzy.php");
    }

?>
