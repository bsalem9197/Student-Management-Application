
<?php
require_once("secrity.php");
?>


<?php
/*try{

	$strConnection = 'mysql:host=localhost; dbname=scolarite';
	$pdo = new PDO ($strConnection, 'root','');
	
}
	catch(PDOException $e) {
		$msg = 'ERREUR PDO dans ' . $e->getMessage();
		die ($msg);
		
		
	}
	
	*/
	
	$pdo = new PDO('mysql:host=localhost;dbname=scolarite','root','root');
	$req1 = $pdo->query('SELECT * FROM etudiants ');
	//$donnees = $req1->fetch();
		
	//echo $donnees['CODE'];
	

?>



