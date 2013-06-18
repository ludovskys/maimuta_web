<?php

	include("../connect.php");

	$conn = connect();

	//$query = "select Code_FR from CPS_Taches_Valides val, CPS_Taches tache where val.Task_Type=tache.Task_Type and id_tache='".$$_POST['id']."'";
	$query = "select Code_FR from CPS_Taches_Valides val, CPS_Taches tache where val.Task_Type = tache.Task_Type and tache.id_tache=".$_POST['id']."";
	$rs = $conn->execute($query); 

	while(!$rs->EOF)
	{ 
		$result = $rs->Fields(0)->value;
		$rs->MoveNext();
	}

	echo $result;

?>