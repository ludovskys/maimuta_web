<?php

function get_sessions_types_tasks($connexion,$idSessionType)
{
	
	$tasks_query = "SELECT CPS_Taches.id_tache, CPS_Taches.nom_tache, CPS_Lien_SessionType_Taches.nb_taches
	FROM CPS_Taches, CPS_Lien_SessionType_Taches
	WHERE CPS_Taches.id_tache = CPS_Lien_SessionType_Taches.id_tache
	AND CPS_Lien_SessionType_Taches.id_session_type = ".$idSessionType;
	
	$rs = executeQuery($connexion, $tasks_query);
	return $rs;
}

?>

