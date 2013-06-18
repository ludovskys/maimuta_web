<?php

require('connect.php');
require('m_sessions_types_tasks.php');



$idSessionType = $_POST['val'];

$res ="";

$connexion = connect();

$i = 0;




$sessionsTypesTasks = get_sessions_types_tasks($connexion,$idSessionType);

while (!$sessionsTypesTasks->EOF) 
{ 
	//array_push($resArray["nom_tache"],"$sessionsTypesTasks[1]");

	$sessionsTypesTasks[0];
	$sessionsTypesTasks[1];

	for ($i = 0; $i < $sessionsTypesTasks[2]; $i++)
	{
		$res.= "<option value=".$sessionsTypesTasks[0].">".$sessionsTypesTasks[1]."</option>";
	}

	

	$sessionsTypesTasks->MoveNext();

	$i++;

}

echo $res;

?>