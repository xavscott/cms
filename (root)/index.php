<?php
  session_start();
	include 'plugins.php';
  include './config/dbcon.php';
  
  $Load="SELECT * FROM cmslink";
			$result =$conn->query($Load);
			if($result->num_rows>0) {
				?>
	
	 <div id="main">
		
	 <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  
  
  <!-- The slideshow/carousel -->
  
 <div class="carousel-inner">
 

	 <?php
			$rowCount = 1;
			$Load="SELECT * FROM image";
			$result =$conn->query($Load);
			
			if($result->num_rows>0){
			
			while($rowUsers=$result->fetch_assoc()) {
			
			?>
				<div class="carousel-item<?php if($rowCount==1){echo " active";}?>">
      <img src="./uploads/<?=$rowUsers['image_name']?>" alt="Chicago" class="d-block w-100">
    </div>
			<?php
			$rowCount++;
			}
			}
			
			
			?>
   </div>
   
  
   
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<div class="container-fluid mt-3">
  </div>


<!-- page content -->
	 <div class="container-fluid mt-3">
  <div class="row">
<?php $Load="SELECT * FROM page";
			$result =$conn->query($Load);
			
			if($result->num_rows>0){
			
			while($rowUsers=$result->fetch_assoc()) {
				
				?>
		
    <div id="<?=$rowUsers['grid_name']?>" class="col-sm-<?=$rowUsers['grid_size']?> p-3 text-black" style="background-color:<?=$rowUsers['grid_color']?>">
	<h2> <?=$rowUsers['grid_title']?> </h2>
	<br>
	
	<?=$rowUsers['grid_content']?>
	
	</div>
	  
 
				<?php
			}
			}
				?>
				 </div>
</div>
<!--page content-->
	 
<!-- gallery -->
<br>


<?php $Load="SELECT * FROM imagegallery";
			$result =$conn->query($Load);
			
			if($result->num_rows>0){
			
			while($rowUsers=$result->fetch_assoc()) {
				
				?>
  <div class="col-sm-2" style="background-color: rgba(53, 122, 236, 0.4); 
color: rgba(53, 122, 236, 0.1); padding: 10px; width:210px; height:210px;"> <img style="width:190px; height: 190px"src="./uploadsGallery/<?=$rowUsers['gallery']?>"></div>
			<?php
			}
			}
			?>
<!-- end of gallery -->	 


<div id="tools">
	
       <a href="admin/login.php"><i class="material-icons">login</i><span class="icon-text"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span></a>
	   
	</div>
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
  >
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      
    </div>
    <!-- Left -->

    <!-- Right -->
    
    
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
		  <?php $Load="SELECT * FROM footer";
			$result =$conn->query($Load);
			
			if($result->num_rows>0){
			
			while($rowUsers=$result->fetch_assoc()) {
				
				?>
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
           &nbsp;&nbsp;&nbsp;<?=$rowUsers['company_name']?>
          </p>
		  
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
       
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Missions
          </h6>
          <p>
           <?=$rowUsers['mission']?>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fa fa-envelope me-3"></i> <?=$rowUsers['email']?></p>
          <p>
            <i class="fa fa-facebook me-3"></i>
            <?=$rowUsers['facebook']?>
          </p>
   
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © <?=$rowUsers['copyright']?> Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Final Exam in CpE Elective</a>
  </div>
  <!-- Copyright -->
  <?php }
			}
			
			?>
</footer>
			
<!-- Footer -->
</div>
<div id="mySidebar" class="sidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
        <?php
	 $Load="SELECT * FROM cmslink";
	 $result =$conn->query($Load);
	 
	 if($result->num_rows>0) {
		 while($rowUsers=$result->fetch_assoc()) {
     ?>   
		<a href="<?=$rowUsers['link']?>"><span><i class="material-icons"><?=$rowUsers['icon']?></i><span class="icon-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rowUsers['title']?></span></a><br>
 
	 <?php
													}
							}
							
	?>
	
	
	<?php
			}
			else {
	 ?>
 </div>



<h1 class="text-center">WELCOME TO YOUR MIDTERM EXAM</h1>
<a href="admin/login.php"><p class="text-center"> CLICK HERE TO CONFIGURE THIS PAGE </p><a/>
<?php
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
	