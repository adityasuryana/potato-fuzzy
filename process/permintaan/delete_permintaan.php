<?php

    require_once('../../connection.php');

    $id = $_GET['id'];

    $query = "DELETE FROM permintaan WHERE id='$id'";

    $result = mysqli_query($conn,$query);

    if($result == true){
        header("location:../../laporan-permintaan.php");
    }

?>
