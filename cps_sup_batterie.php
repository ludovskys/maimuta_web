<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");

?>

	<div id="main">
	<h2 class="title">Suppression d'une batterie</h2>
	<hr id="under-title"/>
	
		<div class="box">
			<form style="margin-left:100px;" method="post" action="cps_sup_batterie_exec.php">
				<div style="margin-left:70px; height:300px; overflow-y:auto; width:350px;">
				<table style="width:300px;" cellspacing="0">
					<tr style="padding-bottom:20px;"><th align="left">Nom de la batterie</th><th align="center">S&eacute;lectionner</th></tr>
				
					<?php
					
						// connexion
						include('connect.php');

						$conn = connect();
					
						// récupération des noms des tâches
						$query = "select DISTINCT id_batterie, nom_batterie FROM CPS_Batteries ORDER BY nom_batterie";
						$rs = $conn->execute($query); 

						while(!$rs->EOF)
						{ 
							$battid = $rs->Fields(0)->value;
							$result = $rs->Fields(1)->value;
							
							$rs->MoveNext();
							
							echo '<tr ><td style="border-top: 1px solid #ccc;">'.$result.'</td><td align="center" style="border-top: 1px solid #ccc;"><input type="checkbox" name="delete['.$battid.']"/></td></tr>';
							$rs2 = $conn->execute("SELECT nom_palier FROM CPS_Paliers p INNER JOIN CPS_Lien_Paliers_Batteries b ON p.id_palier=b.id_palier WHERE id_batterie=$battid");
							while (!$rs2->EOF) {
								$palier = $rs2->Fields(0)->value;
								echo '<tr><td colspan="2">&raquo; '."Contient le palier: ".$palier.'</td></tr>';
								$rs2->MoveNext();
							}																					
					
							
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