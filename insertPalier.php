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
			
			// selection de l'id du dernier palier
			$query = "SELECT MAX(id_palier) FROM CPS_Paliers"; 
			$rs = $conn->execute($query); 
			while(!$rs->EOF)
			{ 
				$idDerPalier = $rs->Fields(0)->value;
				$rs->MoveNext();
			}

			echo $idDerPalier;
			
			// insertion des paramètres de passages du palier créé
			$query = "INSERT INTO CPS_Criteres_Passage_Paliers (id_palier, nb_min_sessions, z_pourcentage, z_last_sessions, y_pourcentage, y_last_tasks) values (".$idDerPalier.", '".$_POST['nombreSessions']."', '".$_POST['tauxreponse1']."', '".$_POST['nombreDerSessions']."', '".$_POST['tauxreponse2']."', '".$_POST['nombreDerTaches']."')";
			$rs = $conn->execute($query);
			
		
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