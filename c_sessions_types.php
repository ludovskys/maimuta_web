<?php

require('connect.php');

$connexion = connect();

$sessionId = 0;

//declare the SQL statement that will query the database 
$query = "INSERT INTO CPS_Sessions_Types (nom_session_type, id_tache_motivation, temps_punition, ratio_recomp, nombre_essai_non_recomp) VALUES ('".$_POST['sessionTypeName']."', '".$_POST['tacheDemotiv']."', '".$_POST['punition']."', '".$_POST['ratio']."', '".$_POST['nbEssai']."');"; 

//execute the SQL statement and return records 
$rs = $connexion->execute($query); 

//declare the SQL statement that will query the database 
$query = "SELECT id_session_type FROM CPS_Sessions_Types WHERE (nom_session_type = '".$_POST['sessionTypeName']."')"; 

//execute the SQL statement and return records 
$rs = $connexion->execute($query); 
 
$num_columns = $rs->Fields->Count(); 
 
for ($i=0; $i < $num_columns; $i++) { 
    $fld[$i] = $rs->Fields($i); 
    $sessionId = $fld[$i]->value; 
} 

// boucle sur les tâches sélectionnées
for ($i = 1; $i <= $_POST['hiddenCompteur']; $i++)
{
	echo 'id : '.$_POST['selectTasks'.$i]. 'nombre : '.$_POST['inputTextNumberTasks'.$i].'</br>';

	// insertion
	$query = "INSERT INTO CPS_Lien_SessionType_Taches (id_tache, id_session_type, nb_taches) VALUES ('".$_POST['selectTasks'.$i]."', '".$sessionId."', '".$_POST['inputTextNumberTasks'.$i]."')";

	echo $query;

	//execute the SQL statement and return records 
	$connexion->execute($query); 
}


header('Location: cps_new_session_type.php?ok=ok');

?>