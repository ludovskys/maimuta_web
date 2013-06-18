<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");

?>

	<div id="main">
	<h2 class="title">Suppression d'une t&acirc;che</h2>
	<hr id="under-title"/>
	
		<div class="box">
			<form style="margin-left:100px;" method="post" action="cps_sup_tache_exec.php">
				<div style="margin-left:70px; height:300px; overflow-y:auto; width:350px;">
				<table style="width:300px;" cellspacing="7px">
					<tr style="padding-bottom:20px;"><th align="left">Nom de la t&acirc;che</th><th align="center">S&eacute;lectionner</th></tr>
				
					<?php
					
						// connexion
						include('connect.php');
					
						// récupération des noms des tâches
						$query = "select nom_tache from CPS_Taches";
						$rs = $conn->execute($query); 

						while(!$rs->EOF)
						{ 
							$result = $rs->Fields(0)->value;
							$rs->MoveNext();
							
							echo '<tr><td>'.$result.'</td><td align="center"><input type="checkbox" name="'.$result.'"/></td></tr>';
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