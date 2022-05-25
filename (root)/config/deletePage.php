<?php
SESSION_START();
require_once 'dbcon.php';

$grid_no = $_POST['grid_no'];



$sqlDelete="DELETE FROM page WHERE grid_no ='{$grid_no}'";
if($conn->query($sqlDelete)===TRUE) {
	$_SESSION['deleted']="Link Successfully Deleted!";
header("Location:../admin/content.php");

}
else {
	echo 	"ERROR: ".$sqlUpdateUser."<br>".$conn->error;
}
$conn->close();
?>