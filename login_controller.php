<?php
session_start();
include 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($conn,"SELECT * FROM user where username='$username' and password='$password'");
$check = mysqli_num_rows($login);

if($check > 0){
	$data = mysqli_fetch_assoc($login);

	if($data['level']=="admin"){
		$_SESSION['name'] = $data['name'];
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "loggedin";
		$_SESSION['level'] = "admin";
		header("location:admin.php");

  }else if($data['level']=="owner"){
		$_SESSION['name'] = $data['name'];
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "loggedin";
		$_SESSION['level'] = "owner";
		header("location:owner.php");

	}else{
		header("location:index.php?message=failed");
	}

}else{
	header("location:index.php?message=failed");
}

?>
