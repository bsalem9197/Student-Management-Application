
<?php
if(!($_SESSION["PROFILE"]["ROLE"]=="scolarite")){
	
	header("location:$_SERVER[HTTP_REFERER]");
	
	
}
?>