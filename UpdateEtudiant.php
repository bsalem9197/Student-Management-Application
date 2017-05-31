
<?php
require_once("secrity.php");
require_once("RoleScolarite.php");
?>



<?php 


$code=$_POST['code'];
$nom=$_POST['nom'];
$email=$_POST['email'];
$nomPhoto=$_FILES['photo']['name'];

require_once("conn.php");
if($nomPhoto==""){
		
$ps=$pdo->prepare("UPDATE  etudiants SET NOM=?,EMAIL=? WHERE CODE=?");
$params=array($nom,$email,$code);
$ps->execute($params);
	
}else{
	$fichierTempo=$_FILES['photo']['tmp_name'];
	move_uploaded_file($fichierTempo,'./images/'.$nomPhoto);
//echo($fichierTempo);

$ps=$pdo->prepare("UPDATE  etudiants SET NOM=?,EMAIL=?,PHOTO=? WHERE CODE=?");
$params=array($nom,$email,$nomPhoto,$code);
$ps->execute($params);
}



header("location:etudiants.php");

?>