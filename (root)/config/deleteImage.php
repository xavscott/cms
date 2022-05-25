<?php
SESSION_START();
require_once 'dbcon.php';

$image_id = $_POST['image_id'];



$sqlDelete="DELETE FROM image WHERE image_id ='{$image_id}'";
if($conn->query($sqlDelete)===TRUE) {
	$_SESSION['imagedeleted']="Image Successfully Deleted!";
header("Location:../admin/carousel_dashboard.php");

}
else {
	echo 	"ERROR: ".$sqlUpdateUser."<br>".$conn->error;
}
$conn->close();
?>