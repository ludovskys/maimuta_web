<?php session_start();

include("connect.php");

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			$conn = connect();

			// session
			$query = "INSERT INTO CPS_Batteries (nom_batterie) values ('".$_POST['nom_batterie']."')";
			$rs = $conn->execute($query); 
			
			// id de la session
			$query = "SELECT id_batterie FROM CPS_Batteries WHERE nom_batterie = '".$_POST['nom_batterie']."'";
			$rs = $conn->execute($query); 
			while(!$rs->EOF)
			{ 
				$id = $rs->Fields(0)->value;
				$rs->MoveNext();
			}
			
			// taches de la session
			$tab=$_POST['tab'];
			$tab=explode(',',$tab);
			for($i=0;$i<count($tab);$i++)
			{
				$query = "INSERT INTO CPS_Lien_Paliers_Batteries (id_palier, id_batterie) values (".$tab[$i].", ".$id.")";
				$rs = $conn->execute($query);
			}
			

			$conn->Close();
			
		}
		else
		{
			header('Location: index.php');
		}
	}
	else
	{
		header('Location: index.php');
	}
	
	
?>