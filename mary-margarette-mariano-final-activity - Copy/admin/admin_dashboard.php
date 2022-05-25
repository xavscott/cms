 <?php
	SESSION_START();
	include '../plugins.php';
	include '../config/dbcon.php';
	$loginAuth = $_SESSION['loginAuth'];
	if ($loginAuth==1) {
	
 ?>

<!-- The Modification Modal -->
<div class="modal" id="modModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Domain Name Setting</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container mt-3">
    <table class="table-borderless" >
        <thead>
            <tr>
                <th>Title</th>
                <th style="width:40%">Domain Name</th>
				<th style="width:25%">Icon</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
		<?php
			$Load="SELECT * FROM cmslink";
			$result =$conn->query($Load);
			if($result->num_rows>0) {
			while($rowUsers=$result->fetch_assoc()) {
			?>
			<form action="../config/updateCMS.php" method="POST">
			<input type="hidden" name="titleID" value="<?=$rowUsers['titleID']?>"> 
            <tr>	
				<td> <input type="text" style="border-style: none; width: 80%;" name="title" value="<?=$rowUsers['title']?>"> </td>
				<td> <input type="text" style="border-style: none; width: 100%;" name="link" value="<?=$rowUsers['link']?>">	</td>
				<td> <select name="icon"  value="Hello" style="width: 80%;">
						<option value="<?=$rowUsers['icon']?>"><?=$rowUsers['icon']?></option>
						<option value="home">home</option>
						<option value="account_circle">account circle</option>
						<option value="settings">settings</option>
						<option value="facebook">facebook</option>
						<option value="play_arrow">youtube</option>
						<option value="settings">settings</option>
						<option value="favorite">favorite</option>
						<option value="schedule">schedule</option>
						<option value="language">language</option>
						<option value="fingerprint">fingerprint</option>
						<option value="event">event</option>
						<option value="verified">verified</option>
						<option value="calendar_today">calendar today</option>
						<option value="history">history</option>
						<option value="credit_card">credit card</option>
						<option value="account_balance">account balance</option>
						<option value="build">build</option>
						<option value="work">work</option>
						<option value="contact_support">contact support</option>
						<option value="feedback">feedback</option>
						<option value="bug_report">bug report</option>
						<option value="info">info</option>
						
					</select>
				</td>
			
				
			
			
				<td><button onclick="return confirm('Apply the new settings?')" style="padding: 10px; border-style: none; background-color: inherit;"type="submit"><i class="fa fa-save"></i></button> </td>
		 <td><button formaction="../config/deleteCMS.php" onclick="return confirm('Delete this item?')" style="padding: 10px; border-style: none; background-color: inherit;"type="submit" formaction="../config/delete.php"><i class="fa fa-trash"></i></button> </td>
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

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

 <!-- The Add Modal -->
<div class="modal" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Domain Name</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     <div class="container mt-3">
    <table class="table-borderless">
        <thead>
            <tr>
                <th>Title</th>
                <th>Domain Name</th>
				<th>Icon</th>
            </tr>
        </thead>
        <tbody>
            <tr>
				<form action="../config/addLink.php" method="POST">
                <td><input type="text" name="title" style="width:90%" required></td>
                <td><input type="text" name="link" style="width:90%" required></td>
				<td><select name="icon">
						<option value="home">home</option>
						<option value="account_circle">account circle</option>
						<option value="settings">settings</option>
						<option value="facebook">facebook</option>
						<option value="play_arrow">youtube</option>
						<option value="settings">settings</option>
						<option value="favorite">favorite</option>
						<option value="schedule">schedule</option>
						<option value="language">language</option>
						<option value="fingerprint">fingerprint</option>
						<option value="event">event</option>
						<option value="verified">verified</option>
						<option value="calendar_today">calendar today</option>
						<option value="history">history</option>
						<option value="credit_card">credit card</option>
						<option value="account_balance">account balance</option>
						<option value="build">build</option>
						<option value="work">work</option>
						<option value="contact_support">contact support</option>
						<option value="feedback">feedback</option>
						<option value="bug_report">bug report</option>
						<option value="info">info</option>
						
					</select>
				</td>
				
        </tbody>
    </table>
</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
	 
        <button type="submit" class="btn btn-success" >Save</button>
		</form>
      </div>

    </div>
  </div>
</div>
 
  <div id="mySidebar" class="sidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
     <a href="admin_dashboard.php"><span><i class="material-icons">links</i><span style="font-size: 15px;">&nbsp;&nbsp;&nbsp;NAVIGATION BAR </span></a><br>
	 <a href="carousel_dashboard.php"><span><i class="material-icons">image</i><span style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CAROUSEL </span></a><br>
	<a href="content.php"><span><i class="material-icons">article</i><span style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PAGE CONTENT </span></a><br>
	<a href="gallery_dashboard.php"><span><i class="material-icons">perm_media</i><span style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GALLERY </span></a><br>
  <a href="footer_dashboard.php"><span><i class="material-icons">display_settings</i><span style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FOOTER </span></a><br> 
  </div>

    <div id="main">
	<?php if (isset($_SESSION['added'])) {
		?>
		
		<p class="text-center alert alert-success" >
		
		<?php
		echo "Domain Name Added!";
		unset($_SESSION['added']);
		

	}
		
		?>
		</p>
		
		<?php if (isset($_SESSION['updated'])) {
		?>
		
		<p class="text-center alert alert-success" >
		
		<?php
		echo "Domain Name Updated!";
		unset($_SESSION['updated']);
		

	}
		
		?>
		</p>
		
		<?php if (isset($_SESSION['deleted'])) {
		?>
		
		<p class="text-center alert alert-success" >
		
		<?php
		echo "Domain Name Deleted!";
		unset($_SESSION['deleted']);
		

	}
		
		?>
		</p>
	<div id="tools">
	
		<a href="#" ><i class="material-icons" data-bs-toggle="modal" data-bs-target="#addModal">add</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span></a>
		<a href="#" ><i class="material-icons" data-bs-toggle="modal" data-bs-target="#modModal">edit</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span></a>
       <a href="../config/logout.php" onclick="return confirm('Logout?')"><i class="material-icons">logout</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span></a>
	   
	</div>

<!-- grid --> 
		  <table class="table table-bordered" >
		  <h4 class="text-center"> Link Management </h4>
        <thead>
            <tr>
                <th style="width:20%"> Title</th>
                <th style="width:40%">Domain Name</th>
				<th style="width:25%">Icon</th>
				<th style="width:25%">Actions</th>
				
			
            </tr>
        </thead>
        <tbody>
		<?php
			$Load="SELECT * FROM cmslink";
			$result =$conn->query($Load);
			if($result->num_rows>0) {
			while($rowUsers=$result->fetch_assoc()) {
			?>
			<form action="../config/updateCMS.php" method="POST">
			<input type="hidden" name="titleID" value="<?=$rowUsers['titleID']?>"> 
            <tr>	
				<td> <input type="text" style="border-style: none; width: 80%; background-color: inherit" name="title" value="<?=$rowUsers['title']?>"> </td>
				<td> <input type="text" style="border-style: none; width: 100%; background-color: inherit;" name="link" value="<?=$rowUsers['link']?>">	</td>
				<td> <select name="icon"  value="Hello" style="width: 80%; background-color: inherit; border-style: none">
						<option value="<?=$rowUsers['icon']?>"><?=$rowUsers['icon']?></option>
						<option value="home">home</option>
						<option value="account_circle">account circle</option>
						<option value="settings">settings</option>
						<option value="facebook">facebook</option>
						<option value="play_arrow">youtube</option>
						<option value="settings">settings</option>
						<option value="favorite">favorite</option>
						<option value="schedule">schedule</option>
						<option value="language">language</option>
						<option value="fingerprint">fingerprint</option>
						<option value="event">event</option>
						<option value="verified">verified</option>
						<option value="calendar_today">calendar today</option>
						<option value="history">history</option>
						<option value="credit_card">credit card</option>
						<option value="account_balance">account balance</option>
						<option value="build">build</option>
						<option value="work">work</option>
						<option value="contact_support">contact support</option>
						<option value="feedback">feedback</option>
						<option value="bug_report">bug report</option>
						<option value="info">info</option>
						
					</select>
				</td>
			
				
			
			
				<td><button onclick="return confirm('Apply the new settings?')" style="padding: 10px; border-style: none; background-color: inherit;"type="submit"><i class="fa fa-save"></i></button>
		<button formaction="../config/deleteCMS.php" onclick="return confirm('Delete this item?')" style="padding: 10px; border-style: none; background-color: inherit;"type="submit" formaction="../config/delete.php"><i class="fa fa-trash"></i></button> </td>
			</tr>
			</form>
				<?php
			}
			}
			
			
			?>
			<tr>
			<form action="../config/addLink.php" method="POST"> 
			<td> <input type="text" style="border-style: none; width: 80%; background-color: inherit" name="title" required> </td>
				<td> <input type="text" style="border-style: none; width: 100%; background-color: inherit;" name="link" required>	</td>
				<td> <select name="icon"  value="Hello" style="width: 80%; background-color: inherit; border-style: none" required>
				
						<option value="home">home</option>
						<option value="account_circle">account circle</option>
						<option value="settings">settings</option>
						<option value="facebook">facebook</option>
						<option value="play_arrow">youtube</option>
						<option value="settings">settings</option>
						<option value="favorite">favorite</option>
						<option value="schedule">schedule</option>
						<option value="language">language</option>
						<option value="fingerprint">fingerprint</option>
						<option value="event">event</option>
						<option value="verified">verified</option>
						<option value="calendar_today">calendar today</option>
						<option value="history">history</option>
						<option value="credit_card">credit card</option>
						<option value="account_balance">account balance</option>
						<option value="build">build</option>
						<option value="work">work</option>
						<option value="contact_support">contact support</option>
						<option value="feedback">feedback</option>
						<option value="bug_report">bug report</option>
						<option value="info">info</option>
						
					</select>
				</td>
			<td> <button style="padding: 10px; border-style: none; background-color: inherit;" type="submit" >
			<i class="fa fa-plus"></i>
			</button>
			</form>
			</td>
			
			</tr>
			
			</tbody>
			
			</table>
			<!-- grid --> 
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