<?php
SESSION_START();
require_once 'dbcon.php';


$title = $_POST['title'];
$link = $_POST['link'];
$icon = $_POST['icon'];
$AddLink="INSERT INTO cmsLink(title, link, icon) values ('{$title}','{$link}','{$icon}')";
if($conn->query($AddLink)===TRUE) {
	$_SESSION['added']="true";
header("Location:../admin/admin_dashboard.php");
}
$conn->close();


?>