<?php
SESSION_START();
require_once 'dbcon.php';

$galleryID = $_POST['galleryID'];



$sqlDelete="DELETE FROM imagegallery WHERE galleryID ='{$galleryID}'";
if($conn->query($sqlDelete)===TRUE) {
	$_SESSION['imagedeleted']="Image Successfully Deleted!";
header("Location:../admin/gallery_dashboard.php");

}
else {
	echo 	"ERROR: ".$sqlUpdateUser."<br>".$conn->error;
}
$conn->close();
?>