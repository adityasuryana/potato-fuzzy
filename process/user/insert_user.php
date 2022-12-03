<?php
    require_once('../../connection.php');

    $name = $_POST['name'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    $password = $_POST['password'];


    $sql = "INSERT INTO user(name, username, level, password) VALUES ('$name', '$username', '$level','$password')";
    $result = $conn->query($sql);

    if ($result) {
        header("location:../../user-list.php");
    }
    else{
        echo "Failed". mysqli_error($conn);
    }

?>
