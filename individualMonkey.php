<?php
session_start();
include('head.php');

function getId()
{
    if(isset($_POST['id_singe']))
    {
        echo $_POST['id_singe'];
    }
    else
    {
        echo "";
    }
}
?>

<div id="main">
<?php
    switch($_POST['typeModif'])
    {
        case "insert":
            echo "<h2 class='title'>Ajouter un pnh</h2>";
        break;
        case "update":
            echo "<h2 class='title'>Modifier un pnh</h2>";
        break;
    }
    
?>
		
		<hr id="under-title"/>
		
			<div class="box" style="width:500px;">
		
				<input type="hidden" id="id_singe" name="id_singe" value="<?php getId(); ?>" >
				<!--<input type="hidden" id="role_utilisateur_courant" name="role_utilisateur_courant" value="<?php //getCurrentUserRole() ?>" >-->

				<table id="userTable" cellspacing="11px">
					<tr>
						<td style="width:350px;" >Nom : </td>
						<td><input type="text" value="" id="txtNom_singe" name="nom_singe"></td>
						<td id="nom_singe"></td>
					</tr>
					<tr>
						<td>Date de naissance : </td>
						<td><input type="text" value="" id="txtDateNaissance_singe" name="dateNaissance_singe" size="9"></td>
						<td id="dateNaissance_singe" width="500"></td>
					</tr>
					<tr>
						<td>Lieu de naissance : </td>
						<td><input type="text" value="" id="txtLieuNaissance_singe" name="lieuNaissance_singe"></td>
						<td id="lieuNaissance_singe" width="500"></td>
					</tr>
					<tr>
						<td>Groupe : </td>
						<td><select id="groupe_singe"></select></td>
						
					</tr>
					<tr>
						<td>Type : </td>
						<td><select id="txtType_singe"></select></td>
						<td id="type_singe"></td>
					</tr>
					<tr>
						<td>RFID bras gauche : </td>
						<td><input type="text" value="" id="txtPuce_singe_gauche" name="puce_singe"></td></td>
						<td id="puce_singe_gauche"></td>
					</tr>
                		<tr>
						<td>RFID bras droit : </td>
						<td><input type="text" value="" id="txtPuce_singe_droit" name="puce_singe"></td></td>
						<td id="puce_singe_droit"></td>
					</tr>
					<tr>
						<td>Description : </td>
						<td><textarea value="" id="txtDesc_singe" name="descriptif_singe"></textarea></td> 
						<td id="descriptif_singe"></td>
					</tr>
					<tr>
						<td>Sexe : </td>
						<td>
							<input type="radio" name="radioButton_sex" value="M">M</input>
							<input type="radio" name="radioButton_sex" value="F">F</input><br>
						</td>
						<td id="sexe_singe"></td>
					</tr>
				</table>
				
				<input style="margin-left:130px; margin-top:20px;" type="button" value='Valider' name="Valider" id="boutton" onclick="monkeyTreatment();"/>
				<div style="margin-top:20px;" id='etat'></div>
				<input type="hidden" name="typeModif" id="typeModif" value="<?php echo $_POST['typeModif']; ?>"/>
		
			</div>
			
			<a class="back" href="monkey_list.php">Retour</a>
  <script>
  
   	<?php
   switch($_POST['typeModif'])
    {
        case "insert":
            echo "$(document).ready(getAllGroupesOnCreate());";
            //echo "$(document).ready(getAllTypesOnCreate());";
        break;
        case "update":
            echo "$(document).ready(recupInfosSinge());";
        break;
    }
    ?>

	$(function() {
		$( "#txtDateNaissance_singe" ).datepicker({
			// Permet de directement sélectionner l'année
			changeYear: true,
			// Rang entre il y a 90 ans et l'année d'aujourd'hui
			yearRange: "-90:+0"
		});
	});


  </script
<?php
include('foot.php');
?>

