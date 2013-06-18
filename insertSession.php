<?php session_start();

	include("connect.php");

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			$conn = connect();

			// session
			$query = "INSERT INTO CPS_Sessions (nom_session) values ('".$_SESSION['name']."')";
			$rs = $conn->execute($query); 
			
			// id de la session
			$query = "SELECT id_session FROM CPS_Sessions WHERE nom_session = '".$_SESSION['name']."'";
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
				$query = "INSERT INTO CPS_Lien_Sessions_Taches (id_tache, id_session) values (".$tab[$i].", ".$id.")";
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