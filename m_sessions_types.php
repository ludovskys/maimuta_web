<?php

function get_sessions_types($connexion)
{
	$tasks_query = "SELECT CPS_Sessions_Types.id_session_type, CPS_Sessions_Types.nom_session_type
	FROM CPS_Sessions_Types";
	$rs = executeQuery($connexion, $tasks_query);
	return $rs;
}

?>

