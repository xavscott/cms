<?php
SESSION_START();
require_once 'dbcon.php';

$titleID = $_POST['titleID'];



$sqlDelete="DELETE FROM cmslink WHERE titleID ='{$titleID}'";
if($conn->query($sqlDelete)===TRUE) {
	$_SESSION['deleted']="Link Successfully Deleted!";
header("Location:../admin/admin_dashboard.php");

}
else {
	echo 	"ERROR: ".$sqlUpdateUser."<br>".$conn->error;
}
$conn->close();
?>