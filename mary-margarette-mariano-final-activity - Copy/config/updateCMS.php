<?php
require_once 'dbcon.php';
SESSION_START();
$titleID = $_POST['titleID'];
$title = $_POST['title'];
$link = $_POST['link'];
$icon= $_POST['icon'];

$sqlUpdate="UPDATE cmslink SET title='$title',link='$link',icon='$icon' WHERE titleID ='{$titleID}'";
if($conn->query($sqlUpdate)===TRUE) {
	$_SESSION['updated']="Link Successfully Updated!";
header('Location:../admin/admin_dashboard.php');

}

$conn->close();
?>