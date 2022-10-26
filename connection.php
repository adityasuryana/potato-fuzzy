<?php
$conn = mysqli_connect("localhost","root","","fuzzy_db");

// Check connection
if (mysqli_connect_errno()){
	echo "Connection failed : " . mysqli_connect_error();
}

?>
