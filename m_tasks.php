<?php

function get_tasks($connexion)
{
	$tasks_query = "SELECT CPS_Taches.id_tache, CPS_Taches.nom_tache, CPS_Taches.Task_Type, CPS_Taches.lien_xml_tache
	FROM CPS_Taches";
	$rs = executeQuery($connexion, $tasks_query);
	return $rs;
}

?>

