<?php
require_once 'dbcon.php';
SESSION_START();
$grid_no = $_POST['grid_no'];
$grid_name = $_POST['grid_name'];
$grid_title = $_POST['grid_title'];
$grid_size = $_POST['grid_size'];
$grid_color= $_POST['grid_color'];
$grid_content= $_POST['grid_content'];

$sqlUpdate="UPDATE page SET grid_name='$grid_name', grid_title='$grid_title',grid_size='$grid_size', grid_color='$grid_color', grid_content='$grid_content' WHERE grid_no ='{$grid_no}'";
if($conn->query($sqlUpdate)===TRUE) {
	$_SESSION['updated']="Content Successfully Updated!";
header('Location:../admin/content.php');

}

$conn->close();
?>