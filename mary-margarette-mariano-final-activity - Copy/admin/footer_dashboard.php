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
	
			
       <a href="../config/logout.php" onclick="return confirm('Logout?')"><i class="material-icons">logout</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span></a>
	   
	</div>


<!-- grid --> 
		  <table class="table table-bordered" >
		  <h4 class="text-center"> Footer Management </h4>
        <thead>
            <tr>
                <th style="width:20%">COMPANY NAME</th>
                <th style="width:5%">COPYRIGHT</th>
				<th style="width:20%">MISSION</th>
				<th style="width:20%">EMAIL</th>
				<th style="width:20%">FACEBOOK</th>
				<th style="width:5%">ACTIONS</th>
				
			
            </tr>
        </thead>
        <tbody>
		<?php
			$Load="SELECT * FROM footer";
			$result =$conn->query($Load);
			if($result->num_rows>0) {
			while($rowUsers=$result->fetch_assoc()) {
			?>
			<form action="../config/updateFooter.php" method="POST">
			<input type="hidden" name="footer_id" value="<?=$rowUsers['footer_id']?>"> 
            <tr>	
				<td> <input type="text" style="border-style: none; width: 80%; background-color: inherit" name="company_name" value="<?=$rowUsers['company_name']?>"> </td>
				<td> <input type="text" style="border-style: none; width: 100%; background-color: inherit;" name="copyright" value="<?=$rowUsers['copyright']?>">	</td>
				<td> <input type="text" style="border-style: none; width: 100%; background-color: inherit;" name="mission" value="<?=$rowUsers['mission']?>">	</td>
		<td> <input type="text" style="border-style: none; width: 100%; background-color: inherit;" name="email" value="<?=$rowUsers['email']?>">	</td>	
			<td> <input type="text" style="border-style: none; width: 100%; background-color: inherit;" name="facebook" value="<?=$rowUsers['facebook']?>">	</td>	
			
			
				<td><button onclick="return confirm('Apply the new settings?')" style="padding: 10px; border-style: none; background-color: inherit;"type="submit"><i class="fa fa-save"></i></button>
		</td>
			</tr>
			</form>
				<?php
			}
			}
			
			
			?>
			<tr>
			
			</td>
			
			</tr>
			
			</tbody>
			
			</table>
			<!-- grid --> 

	<?php if (isset($_SESSION['deleted'])) {
		?>
		
		<p class="text-center alert alert-success" >
		
		<?php
		echo "Grid Deleted!";
		unset($_SESSION['deleted']);
		

	}
		
		?>
		
		<?php if (isset($_SESSION['added'])) {
		?>
		
		<p class="text-center alert alert-success" >
		
		<?php
		echo "Grid Added!";
		unset($_SESSION['added']);
		

	}
		
		?>
		<?php if (isset($_SESSION['updated'])) {
		?>
		
		<p class="text-center alert alert-success" >
		
		<?php
		echo "Grid Updated!";
		unset($_SESSION['updated']);
		

	}
		
		?>
 
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