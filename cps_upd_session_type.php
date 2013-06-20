<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include('head.php');
			include('c_tasks_list.php');

			$listeTask=getTasksList();
			
?>

	<div id="main">
		<h2 class="title">Modification d'une session type</h2>
		<hr id="under-title"/>
	
			<div class="box" style="width:500px;">
			
				<select name="txtNomSessionType" id="txtNomSessionType" onChange="recupInfos();" style="display:block; margin-bottom:25px;" >
					<option value="0">&raquo; S&eacute;lectionner une session type</option>
					<?php
					
						$conn = connect();
						$res = $conn->execute("SELECT * FROM CPS_Sessions_Types ORDER by nom_session_type ASC");
						while (!$res->EOF) 
						{
							$id = $res->Fields(0)->value;
							$nom = $res->Fields(1)->value;
							$res->MoveNext();
							echo "<option value='$id'>$nom</option>";
						}
						
					?>
				</select>
			
				<label for="inputTextSessionTypeName">Nom de la session type : </label><input id="inputTextSessionTypeName" type="text" name="sessionTypeName" value="" ></br></br>
			
				<input id="buttonAddTasks" type="button" value="+">
				<input id="hiddenCompteur" type="hidden" name="hiddenCompteur">
				
			
			
			
			
			
			
				<!--
				<select id="selectTasks1" name="selectTasks1" style="margin-left:20px; margin-right:31px; margin-bottom:20px;">
				<?php
					
					/*for($i=0; $i<count($listeTask['id_tache']); $i++)
					{
						echo "<option value=".$listeTask['id_tache'][$i].">".$listeTask['nom_tache'][$i]."</option>";
					}*/

				?>
				</select>
				<label for="inputTextNumberTasks1">Nombre : </label><input id="inputTextNumberTasks1" type="text" name="inputTextNumberTasks1" size="3">
				<input class="valid" type='submit' value='Valider' onclick='' style="margin-left:30px;" >-->
					
					
				
			</div>

			<a class="back" href="main_page.php">Retour</a>

			
<script type="text/javaScript" src="js/admin_js.js"></script>
<script src='js/switch.js'></script>
<script src='js/retrieveData2.js'></script>
<script>

	var formSessionType = $('#formSessionType');

	var compteur = 1;

	var hiddenCompteur = $('#hiddenCompteur');

	var taskNameArray = ["<?php echo join("\", \"", $listeTask["nom_tache"]); ?>"];
	var taskIdArray = ["<?php echo join("\", \"", $listeTask["id_tache"]); ?>"];
	
	
	// création de la ligne avec sélection d'une tache et du nombre
	function addTask()
	{
		formSessionType.append('</br><select style="margin-left:55px; margin-right:36px;" id="selectTasks'+compteur+'" name="selectTasks'+compteur+'""></select>');
		formSessionType.append('<label for="inputTextNumberTasks'+compteur+'">Nombre : </label><input id="inputTextNumberTasks'+compteur+'" type="text" name="inputTextNumberTasks'+compteur+'" size="3"> </br>');

		hiddenCompteur.val(compteur);

		for (var i = 0; i < taskNameArray.length; i++)
		{
			$('#selectTasks'+compteur).append('<option value="'+taskIdArray[i]+'">'+taskNameArray[i]+'</option>');
		}

		compteur++;
	}
	
	
	// ajout de nouvelle tache avec le nombre
	$('#buttonAddTasks').click(function() {
  		addTask();
	});
	
	
	// récupération du nom de la session type pour modification et info
	function recupInfos()
	{
		var name = $('#txtNomSessionType option:selected').text();
		var id = $('#txtNomSessionType option:selected').val();
		
		if(id != "0")
		{
			$('#inputTextSessionTypeName').val(name);
		}
		else
		{
			$('#inputTextSessionTypeName').val("");
		}
		
		// recup infos

		
		$.ajax({
			type: "POST",
			url: url,
			data:"typeModif=delete&id_singe="+id,
			success: function(data){
				alert("Le pnh a été supprimé");
				
				window.location.reload();
			}
		});
		
		
		
		
		
		
		
		
	}
	

	
	
	
	
	
	
	
	
</script>

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