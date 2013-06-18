<?php
 session_start();
    include ('head.php');
?>
    <div id="main">
		<h2 class="title">Attribution des batteries aux groupes</h2>
		<hr id="under-title"/>
			
			<div class="box">
    
				<table>
					<tr>
						<th align="left" style="width:250px; padding-bottom:20px;" >Sélectionner un groupe :</th>
						<th align="left" style="width:250px; padding-bottom:20px;" >Batteries pour ce groupe :</th>
					</tr>
					<tr>
						<td style="padding-left:15px;"><select id='groupes' onchange='getAllBatteries();'></select></td>
						<td><select style="min-width:150px; margin-left:20px;" id='batterie_groupe_selected'></select></td>
					</tr>
					<tr>
						<td colspan="2"><input style="margin-left:185px; margin-top:30px;" id='btnChangeBatterie' type='button' value='Valider' onClick='changeGroupeBatterie();'></td>
					</tr>
					<tr>
						<td><div id="resultat"></div></td>
					</tr>
				</table>
    
    
			</div>
			
			<a class="back" href="main_page.php">Retour</a>
			
<?php
	include ('foot.php');
 ?>