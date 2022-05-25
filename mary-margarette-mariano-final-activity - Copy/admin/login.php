<?php
SESSION_START();  
include '../plugins.php';
unset($_SESSION['loginAuth']);

?>
<div class="mainContainer">
<div class="loginContainer">

  <h2 class="text-center">Login</h2>
  <form action="../config/loginAuth.php" method="POST">
    <div class="form-group">
      <label for="username">Username:</label> <br>
      <input class="inputText" type="text" class="form-control" id="text"  name="username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label><br>
      <input class="inputText" type="password" class="form-control" id="pwd"  name="password">
    </div>
	<div class="text-center">
    <button style="background-color: inherit; color: white; width: 100%;" "type="submit" class="btn btn-default">Submit</button>
	</div>
  </form>
  <p class="text-center" style="color: red;">
  <?php 
	if (isset($_SESSION['message'])){echo $_SESSION['message']; 
	unset($_SESSION['message']);
		} 
	if (isset($_SESSION['denied'])){echo $_SESSION['denied']; 
	unset($_SESSION['denied']);
		}
		
  ?>
  </p>
</div>

</div>
<br>
<div class="belowContainer text-center">
<button onclick="location.href='../index.php'" style="color: #6fb1e3; font-size:20px; padding: 10px; border-style: none; background-color: inherit;"type="submit"><i class="fa fa-home"></i></button>  
 <p style="color: #666967">Copyright © Mary Margarette Mariano Co., Ltd. 2022. All rights reserved. </p>

</span> </p>

  </div>