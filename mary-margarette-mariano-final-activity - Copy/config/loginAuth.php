<?php
SESSION_START();
include 'dbcon.php';
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);


$login="SELECT * FROM loginAuth WHERE username='{$username}' and password='{$password}' ";
$result=$conn->query($login);


	if ($result->num_rows >0) {
		$_SESSION['loginAuth']=1;
		header("Location:../admin/admin_dashboard.php");
	}
	else {
		$_SESSION['message']="INVALID CREDENTIALS";
		header("Location:../admin/login.php");
	}


	$conn -> close();
?>