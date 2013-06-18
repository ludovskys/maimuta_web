<?php
session_start();
include('head.php');

function getId()
{
    if(isset($_POST['id_groupe']))
    {
        echo $_POST['id_groupe'];
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
            echo "<h2 class='title'>Ajouter un Groupe</h2>";
        break;
        case "update":
            echo "<h2 class='title'>Modifier un Groupe</h2>";
        break;
    }
    
?>
		
		<hr id="under-title"/>
			
			<div class="box" style="width:500px;">
		
				<input type="hidden" id="id_groupe" name="id_groupe" value="<?php getId(); ?>" >
				<!--<input type="hidden" id="role_utilisateur_courant" name="role_utilisateur_courant" value="<?php //getCurrentUserRole() ?>" >-->

				<table id="userTable" cellspacing="11px">
					<tr>
						<td style="width:130px;">Nom : </td>
						<td><input type="text" value="" id="txtNom_groupe" name="nom_groupe"></td>
						<td id="nom_groupe"></td>
					</tr>
					<tr>
						<td>Description : </td>
						<td><input type="text" value="" id="txtDescription_groupe" name="description_groupe"></td>
						<td id="description_groupe" width="500"></td>
					</tr>
					
				</table>
				
				<input style="margin-left:100px; margin-top:20px;" type="button" value='Valider' name="Valider" id="boutton" onclick="groupeTreatment();"/>
				<div id='etat'></div>
				<input type="hidden" name="typeModif" id="typeModif" value="<?php echo $_POST['typeModif']; ?>"/>
		
			</div>
			
			<a class="back" href="groupe_list.php">Retour</a>
  
  <script>

  
   $(document).ready(recupInfosGroupe());
    // var typeModif=$("#typeModif").val();
            // alert(typeModif);
  </script
<?php
include('foot.php');
?>

