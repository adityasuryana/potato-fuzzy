<?php

    require_once('../../connection.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    $password = $_POST['password'];

    $query = "UPDATE user SET name='$name', username='$username', level='$level', password='$password' WHERE id='$id'";

    $result = mysqli_query($conn,$query);

    if($result == true){
        header("location:../../user-list.php");
    }

?>
