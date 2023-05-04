<?php
session_start();
if(isset($_SESSION['IS_LOGIN'])){
	echo "<h1>"."Welcome User !!"."</h1>";
	header('location:welcome.html');
}else{
	// header('location:index.php');
	// die();
}
?>
<a href="logout.php">Logout</a>