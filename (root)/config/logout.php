<?php
SESSION_START();

unset($_SESSION['loginAuth']);
header('Location:../admin/login.php')


?>