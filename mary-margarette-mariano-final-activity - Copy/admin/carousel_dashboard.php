 <?php
	SESSION_START();
	include '../plugins.php';
	include '../config/dbcon.php';
	$loginAuth = $_SESSION['loginAuth'];
	if ($loginAuth==1) {
	
 ?>
 
<?php if (isset($_SESSION['uploaded'])) {
		?>
		
		<p class="text-center alert alert-success" >
		
		<?php
		echo "Image Uploaded Successfully!";
		unset($_SESSION['uploaded']);
		

	}
		
		?>

<?php if (isset($_SESSION['unsupported'])) {
		?>
		
		<p class="text-center alert alert-danger" >
		
		<?php
		echo "File Format Unsupported";
		unset($_SESSION['unsupported']);
		

	}
		
		?>
		</p>
<?php if (isset($_SESSION['notuploaded'])) {
		?>
		
		<p class="text-center alert alert-danger" >
		
		<?php
		echo "There was an error uploading your image";
		unset($_SESSION['notuploaded']);
		

	}
		
		?>
		</p>		
<?php if (isset($_SESSION['imagedeleted'])) {
		?>
		
		<p class="text-center alert alert-success" >
		
		<?php
		echo "Image Successfully Deleted";
		unset($_SESSION['imagedeleted']);
		

	}
		
		?>
		</p>
 
 
  <div id="mySidebar" class="sidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
     <a href="admin_dashboard.php"><span><i class="material-icons">links</i><span style="font-size: 15px;">&nbsp;&nbsp;&nbsp;NAVIGATION BAR </span></a><br>
	 <a href="carousel_dashboard.php"><span><i class="material-icons">image</i><span style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CAROUSEL </span></a><br>
  <a href="content.php"><span><i class="material-icons">article</i><span style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PAGE CONTENT </span></a><br>
  	<a href="gallery_dashboard.php"><span><i class="material-icons">perm_media</i><span style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GALLERY </span></a><br>
  <a href="footer_dashboard.php"><span><i class="material-icons">display_settings</i><span style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FOOTER </span></a><br> 
  </div>

    <div id="main">
	
	<div id="tools">
	
		<a href="#" ><i class="material-icons" data-bs-toggle="modal" data-bs-target="#uploadModal">upload</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span></a>
		
       <a href="../config/logout.php" onclick="return confirm('Logout?')"><i class="material-icons">logout</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span></a>
	   
	</div>

<!-- carousel management--> 
	  <table class="table-borderless" >
        <thead>
            <tr>
                <th style="width: 50%">Image Name</th>
                <th style="width:50%">Image</th>
			
				<th style="width:20%">Action</th>
		
            </tr>
        </thead>
        <tbody>
		<?php
			$Load="SELECT * FROM image";
			$result =$conn->query($Load);
			if($result->num_rows>0) {
			while($rowUsers=$result->fetch_assoc()) {
			?>
			<form action="../config/updateCMS.php" method="POST">
			<input type="hidden" name="image_id" value="<?=$rowUsers['image_id']?>"> 
            <tr>
			<td><?=$rowUsers['image_name']?></td>
			<td> <img src="../uploads/<?=$rowUsers['image_name']?>" width="100" height="100"> </td>
				
		 <td><button formaction="../config/deleteimage.php" onclick="return confirm('Delete this image?')" style="padding: 10px; border-style: none; background-color: inherit;"type="submit" ><i class="fa fa-trash"></i></button> </td>
		
			</tr>
			</form>
				<?php
			}
			}
			
			?>
			</tbody>
			
			</table>
    </div>
 	</div>
<!-- carousel management --> 


<!-- The Modal -->
<div class="modal" id="uploadModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload an Image</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     	<form action="../config/upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload" required> 
  

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
	  <input type="submit" class="btn btn-primary" value="Upload Image" name="submit" data-bs-dismiss="modal">
       </form>
      </div>

    </div>
  </div>
</div>

	
	
 
   <script>
        var mini = true;

        function toggleSidebar() {
            if (mini) {
                console.log("opening sidebar");
                document.getElementById("mySidebar").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
                this.mini = false;
            } else {
                console.log("closing sidebar");
                document.getElementById("mySidebar").style.width = "85px";
                document.getElementById("main").style.marginLeft = "85px";
                this.mini = true;
            }
        }
    </script>
 

<?php
	}
	else {
		$_SESSION['denied']="ACCESS DENIED";
		header('Location:../admin/login.php');
	}


?>