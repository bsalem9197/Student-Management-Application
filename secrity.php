<?php
	session_start();
if(!(isset($_SESSION['PROFILE']))){
	
	
	header("location:Login.php");
}
	
	

?>
