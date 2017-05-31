

<?php
require_once("secrity.php");
require_once("RoleScolarite.php");
?>


<?php 


$nom=$_POST['nom'];
$email=$_POST['email'];
$nomPhoto=$_FILES['photo']['name'];
$fichierTempo=$_FILES['photo']['tmp_name'];

move_uploaded_file($fichierTempo,'./images/'.$nomPhoto);
echo($fichierTempo);
require_once("conn.php");
$ps=$pdo->prepare("INSERT INTO etudiants(NOM,EMAIL,PHOTO) VALUES (?,?,?)");
$params=array($nom,$email,$nomPhoto);
$ps->execute($params);
header("location:etudiants.php");

?>