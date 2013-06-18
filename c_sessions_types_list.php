<?php 
//if(isset($_SESSION['role']) && ($_SESSION['role']==1 || $_SESSION['role']==2)){

	require('connect.php');
	require('m_sessions_types.php');

	function getSessionsTypesList()
	{
		$res ="";

		$connexion = connect();

		$i = 0;

		$res.= "<select style='display:block; float:left; margin-left:10px; margin-top:20px;' id='selectSessionType' name='selectSessionType' size='10' onchange='getval(this);'>";

		$sessionsTypes = get_sessions_types($connexion);
		while (!$sessionsTypes->EOF) 
		{ 
			//array_push($resArray["nom_tache"],"$sessionsTypes[1]");

			$sessionsTypes[0];
			$sessionsTypes[1];

			$res.= "<option value=".$sessionsTypes[0].">".$sessionsTypes[1]."</option>";

			$sessionsTypes->MoveNext();

			$i++;

		}	

		$res.=  "</select>";

		return $res;
	}

?>