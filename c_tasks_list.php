<?php 
//if(isset($_SESSION['role']) && ($_SESSION['role']==1 || $_SESSION['role']==2)){

	require('connect.php');
	require('m_tasks.php');

	function getTasksList()
	{

		$connexion = connect();

		$resArray = array("id_tache","nom_tache");

		$i = 0;

		$tasks = get_tasks($connexion);
		while (!$tasks->EOF) 
		{ 

			//array_push($resArray["nom_tache"],"$tasks[1]");

			$resArray["id_tache"][$i] = "$tasks[0]";
			$resArray["nom_tache"][$i] = "$tasks[1]";

			$tasks->MoveNext();

			$i++;

		}	

		return $resArray;
	}

?>