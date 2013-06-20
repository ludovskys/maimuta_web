<?php session_start();

	include("connect.php");

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			$conn = connect();

			// session
			$query = "INSERT INTO CPS_Paliers (nom_palier) values ('".$_POST['nom_palier']."')"; 
			$rs = $conn->execute($query); 
			
			// id de la session
			$query = "SELECT id_palier FROM CPS_Paliers WHERE nom_palier = '".$_POST['nom_palier']."'"; 
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
				$query = "INSERT INTO CPS_Lien_Sessions_Paliers (id_session, id_palier) values (".$tab[$i].", ".$id.")";
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