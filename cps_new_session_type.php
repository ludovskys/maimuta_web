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
		<h2 class="title">Cr&eacute;ation d'une session type</h2>
		<hr id="under-title"/>
	
			<div class="box">
				<form id ="formSessionType" method="post" action="c_sessions_types.php">
					<label for="inputTextSessionTypeName">Nom de la session type : </label><input id="inputTextSessionTypeName" type="text" name="sessionTypeName"></br></br>
					<input id="buttonAddTasks" type="button" value="+">
					<input id="hiddenCompteur" type="hidden" name="hiddenCompteur">
					<select id="selectTasks1" name="selectTasks1" style="margin-left:20px; margin-right:31px; margin-bottom:20px;">
					<?php
						
						for($i=0; $i<count($listeTask['id_tache']); $i++)
						{
							echo "<option value=".$listeTask['id_tache'][$i].">".$listeTask['nom_tache'][$i]."</option>";
						}
	
					?>
					</select>
					<label for="inputTextNumberTasks1">Nombre : </label><input id="inputTextNumberTasks1" type="text" name="inputTextNumberTasks1" size="3">
					<input class="valid" type='submit' value='Valider' onclick='' style="margin-left:30px;" >
				</form>
				<?php
					
					if(isset($_GET['ok']) && ($_GET['ok'] == "ok"))
					{
						echo "Cr&eacute;ation &eacute;ffectu&eacute;e !";
					}					
				
				?>
				
			</div>

			<a class="back" href="main_page.php">Retour</a>

			
<script type="text/javaScript" src="js/admin_js.js"></script>
<script>
	var formSessionType = $('#formSessionType');

	var compteur = 2;

	var hiddenCompteur = $('#hiddenCompteur');

	var taskNameArray = ["<?php echo join("\", \"", $listeTask["nom_tache"]); ?>"];
	var taskIdArray = ["<?php echo join("\", \"", $listeTask["id_tache"]); ?>"];
	

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

	//addTask();
	
	
	$('#buttonAddTasks').click(function() {
  		addTask();
	});
	
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