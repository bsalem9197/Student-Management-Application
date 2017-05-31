<?php
require_once("secrity.php");
?>


<?php

	require_once("conn.php");
	$mc="";
	$size=3;
	//juste un end test pour le mot cle 
	if(isset($_GET['page'])){
		//juste un end test
		$page=$_GET['page'];
	}else{
		$page=0;
	}
		
			
	$offset=$size*$page;
		
	if(isset($_GET['motCle'])){
		
		$mc=$_GET['motCle'];
		$req="SELECT * FROM etudiants WHERE NOM like '%$mc%' LIMIT $size OFFSET $offset";
		
	}else{
		
		$req="SELECT * FROM etudiants LIMIT $size OFFSET $offset ";
		
	}

	
	
	
	$ps=$pdo->prepare($req);
	$ps->execute();
	if(isset($_GET['motCle']))
	$ps2=$pdo->prepare("SELECT COUNT(*) AS NB_ET FROM etudiants  WHERE NOM like '%$mc%'");
	else 	$ps2=$pdo->prepare("SELECT COUNT(*) AS NB_ET FROM etudiants ");


	$ps2->execute();
	$ligne=$ps2->fetch(PDO::FETCH_ASSOC);
	$NBE=$ligne['NB_ET'];
	if(($NB_ET % $size)==0) $NbPages=floor($NBE / $size);
	else $NbPages= floor($NBE / $size)+1;
?>
<html>

<head> 
<title> </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/myStyle.css"/>
	


  </head>
<body>
<?php require_once("entete.php") ?>


<div  class="col-md-12 xol-xs-12  spacer">
<form method="get" action ="etudiants.php">
<div class="form-group">
<label class="control-label"> Mot Cle:</label>
<input type="text" name="motCle"/>
<button type="submit" > Chercher</button>


</div>


<div class="col-md-12 xol-xs-12  ">
<div class="panel panel-info spacer"> 
	<div class="panel-heading">Liste des etudiants  </div>
	<div class="panel-body"> 

<table class="table table-striped">
	<thead>
		<tr>
		<th> CODE</th> <th> NOM</th><th> EMAIL</th> <th> PHOTO</th>
		
		</tr>

	</thead>
	<tbody>
	<?php while($et=$ps->fetch()){ ?>
		<tr>
		<td> <?php echo($et['CODE']) ?></td>
		<td> <?php echo($et['NOM']) ?></td>
		<td> <?php echo($et['EMAIL']) ?></td>
		<td> <img src="images/<?php echo($et['PHOTO']) ?>" width="100" height="100"></td>
	<td> <a href="EditEtudiant.php?code=<?php echo($et['CODE']) ?>"> Edit </a></td>
	<td> <a onclick="return confirm('Etes-vous sûr..?')" href="SupprimeEtudiant.php?code=<?php echo($et['CODE']) ?>"> Supprimer </a></td>
		</tr>
		
	<?php } ?>
	
	
	</tbody>
	
</table>





	</div>
</div>
<div>
	<ul class="nav nav-pills">
	<?php  for($i=0;$i<$NbPages ;$i++){?>
	<li  class="<?php echo(($i==$page)?'active':"");    ?>">
	<a href="etudiants.php?page=<?php echo($i) ?>$motCle=<?php echo($mc) ?> "> Page <?php echo($i) ?> </a> </li>
	<?php } ?>
	</ul>
</div>

<div>
</body>

</html>


