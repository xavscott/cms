<?php
require_once 'dbcon.php';
SESSION_START();
$footer_id = $_POST['footer_id'];
$company_name = $_POST['company_name'];
$copyright = $_POST['copyright'];
$mission = $_POST['mission'];
$email= $_POST['email'];
$facebook= $_POST['facebook'];

$sqlUpdate="UPDATE footer SET company_name='$company_name', copyright='$copyright',mission='$mission', email='$email', facebook='$facebook' WHERE footer_id ='{$footer_id}'";
if($conn->query($sqlUpdate)===TRUE) {
	$_SESSION['updated']="Footer Successfully Updated!";
header('Location:../admin/footer_dashboard.php');

}

$conn->close();
?>