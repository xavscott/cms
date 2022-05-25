<?php

SESSION_START();
require_once 'dbcon.php';


$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 $_SESSION['unsupported']="true";
header("Location:../admin/carousel_dashboard.php");
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	$image_name =$_FILES['fileToUpload']['name'];
$uploadFile="INSERT INTO image(image_name) values ('{$image_name}')";
if($conn->query($uploadFile)===TRUE) {
	$_SESSION['uploaded']="true";
header("Location:../admin/carousel_dashboard.php");
}
$conn->close();
  } else {
   $_SESSION['notuploaded']="true";
header("Location:../admin/carousel_dashboard.php");
  }
}


?>