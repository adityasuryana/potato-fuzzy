<?php

    require_once('../../connection.php');

    $id = $_GET['id'];

    $query = "DELETE FROM persediaan WHERE id='$id'";

    $result = mysqli_query($conn,$query);

    if($result == true){
        header("location:../../laporan-persediaan.php");
    }

?>
