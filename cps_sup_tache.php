<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");
			include('connect.php');
			$conn = connect();
			if (isset($_POST['sup'])) {
				foreach ($_POST['sup'] as $id => $fisier) {
					$id++; $id--;
					$conn->execute("DELETE FROM CPS_Lien_SessionType_Taches WHERE `id_tache`=$id");
					$conn->execute("DELETE FROM CPS_Sessions_Taches_Ordre WHERE `id_tache`=$id");
					$conn->execute("DELETE FROM CPS_Taches WHERE `id_tache`=$id");
					unlink("./resultats/$fisier.xml");
					//$success = true;					
					echo "<span style='font-size:18px; color:black;'>Supression des t&acirc;chea correctement effectu&eacute;e !</span>";
					//echo "Supression des t&acirc;ches correctement &eacute;ffectu&eacute;e !";

				}
				
			
			} 
?>

	<div id="main">
	<h2 class="title">Suppression d'une t&acirc;che</h2>
	<hr id="under-title"/>
	
		<div class="box">
			<form style="margin-left:100px;" method="post" action="cps_sup_tache.php">
				<div style="margin-left:70px; height:300px; overflow-y:auto; width:350px;">
				<table style="width:300px;" cellspacing="7px">
					<tr style="padding-bottom:20px;"><th align="left">Nom de la t&acirc;che</th><th align="center">S&eacute;lectionner</th></tr>
				
					<?php
						//$success = false;
						
						// récupération des noms des tâches
						$query = "select id_tache, nom_tache from CPS_Taches";
						$rs = $conn->execute($query); 

						while(!$rs->EOF)
						{ 
							$id = $rs->Fields(0)->value;
							$result = $rs->Fields(1)->value;
							$rs->MoveNext();
							
							echo '<tr><td>'.$result.'</td><td align="center"><input type="checkbox" name="sup['.$id.']" value="'.$result.'"/></td></tr>';
						}
					
					?>
		
				</table>
				</div>
				<input class="valid" type="submit" value="Supprimer" /></td>
				
		
			</form>
		</div>

		<a class="back" href="main_page.php">Retour</a>
			
<?php

	
		
			include("foot.php");
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