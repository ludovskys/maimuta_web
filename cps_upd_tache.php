<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");

?>			
	<div id="main">
	<h2 class="title">Modification d'une t&acirc;che</h2>
	<hr id="under-title"/>
	
		<div class="box">
			<form style="margin-left:100px;" method="post" action="cps_upd_tache_exec.php">
			<div style="margin-left:70px; height:300px; overflow-y:auto; width:450px;">
			<table cellspacing="10px" >
				<tr>
					<td colspan="3"><span style="margin-right:10px;">Nom du t&acirc;che:</span>
					<select name="idTache" id="txtIdTache">
					<option value="0">&raquo; S&eacute;lectionner un t&acirc;che</option>
						<?php
							include('connect.php');
							$conn = connect();
										
							// récupération des noms des tâches
							$query = "SELECT id_tache, nom_tache, task_type, lien_xml_tache, date_creation_tache FROM CPS_Taches ORDER BY nom_tache ASC";
							//$query = "select id_tache, nom_tache from CPS_Taches";
							$rs = $conn->execute($query); 
							while (!$rs->EOF) {
								$id = $rs->Fields(0)->value;
								$nom = $rs->Fields(1)->value;
								/*$type = $rs->Fields(2)->value;
								$lien = $rs->Fields(3)->value;
								$date_creation = $rs->Fields(4)->value;*/
								$rs->MoveNext();
								echo "<option value='$id'>$nom</option>";
							}
						?>
		
					</select>
					</td>
				</tr>								
			</table>
			
				<input class="valid" type="submit" value="Modifier" style="display: inline;  margin-right: 50px;" /> 
				<a style="display: inline;" href="main_page.php">Retour</a>
			</form>
			
				
		</div>
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