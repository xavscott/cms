<?php
SESSION_START();
require_once 'dbcon.php';


$grid_name = $_POST['grid_name']; // for id
$grid_title = $_POST['grid_title']; // for heading
$grid_size = $_POST['grid_size']; 
$grid_color= $_POST['grid_color']; // for background
$grid_content= $_POST['grid_content']; // for the main content

$AddLink="INSERT INTO page(grid_name, grid_title, grid_size,grid_color,grid_content) values ('{$grid_name}','{$grid_title}','{$grid_size}','{$grid_color}','{$grid_content}')";
if($conn->query($AddLink)===TRUE) {
	$_SESSION['added']="true";
header("Location:../admin/content.php");
}
$conn->close();


?>