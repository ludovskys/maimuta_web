<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");

?>

	<div id="main">
	<h2 class="title">Suppression d'un palier</h2>
	<hr id="under-title"/>
	
		<div class="box">
			<form style="margin-left:100px;" method="post" action="cps_sup_palier_exec.php">
				<div style="margin-left:70px; height:300px; overflow-y:auto; width:350px;">
				<table style="width:300px;" cellspacing="0">
					<tr style="padding-bottom:20px;"><th align="left">Nom de la palier</th><th align="center">S&eacute;lectionner</th></tr>
				
					<?php
					
						// connexion
						include('connect.php');
					
						// récupération des noms des tâches
						$query = "select id_palier, nom_palier FROM CPS_Paliers ORDER BY nom_palier";
						$rs = $conn->execute($query); 

						while(!$rs->EOF)
						{ 
							$palid = $rs->Fields(0)->value;
							$result = $rs->Fields(1)->value;
							
							$rs->MoveNext();
							
							echo '<tr ><td style="border-top: 1px solid #ccc; font-weight: bold;">'.$result.'</td><td align="center" style="border-top: 1px solid #ccc;"><input type="checkbox" name="delete['.$palid.']"/></td></tr>';
							$rs2 = $conn->execute("SELECT b.nom_batterie FROM CPS_Lien_Paliers_Batteries l INNER JOIN CPS_Batteries b ON b.id_batterie=l.id_batterie WHERE id_palier=$palid");
							while (!$rs2->EOF) {
								$palier = $rs2->Fields(0)->value;
								echo '<tr><td colspan="2">Dans la Batterie: '.$palier.'</td></tr>';
								$rs2->MoveNext();
							}
							$rs3 = $conn->execute("SELECT s.nom_session FROM CPS_Lien_Sessions_Paliers l INNER JOIN CPS_Sessions s ON s.id_session=l.id_session WHERE id_palier=$palid");
							while (!$rs3->EOF) {
								$session = $rs3->Fields(0)->value;
								echo '<tr><td colspan="2">Contient la Session: '.$session.'</td></tr>';
								$rs3->MoveNext();
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