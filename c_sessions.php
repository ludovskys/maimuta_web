<?php

require('connect.php');

$connexion = connect();

$tabSelect = $_POST['tabSelect'];
$tabSelect=explode(',',$tabSelect);

$sessionName = $_POST['sessionName'];
$sessionTypeId = $_POST['sessionTypeId'];

//declare the SQL statement that will query the database 
$query = "INSERT INTO CPS_Sessions (nom_session, sessionType_ref) VALUES ('".$sessionName."', '".$sessionTypeId."');"; 

//execute the SQL statement and return records 
$rs = $connexion->execute($query); 

for ($i = 1; $i <= count($tabSelect); $i++)
{
	//declare the SQL statement that will query the database 
	$query = "INSERT INTO CPS_Sessions_Taches_Ordre (id_tache, id_session, ordre) 
	 SELECT ".$tabSelect[$i-1].", MAX(id_session), ".$i." FROM CPS_Sessions "; 

	 echo $query;

	 echo 'count($tabSelect) : '.count($tabSelect);

	//execute the SQL statement and return records 
	$rs = $connexion->execute($query); 
}



?>