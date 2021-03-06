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
					<b>Crit&egrave;res de la session type:</b></br></br>
					<div style="margin-bottom:7px;"><label for="punition">Choisir le d&eacute;lais d'affichage de l'&eacute;cran blanc : </label><input id="punition" type="text" name="punition" size="2" > secondes</div>
					<div style="margin-bottom:7px;"><label for="ratio">Choisir le ratio de r&eacute;compense : </label><input id="ratio" type="text" name="ratio" size="2"></div>
					<div style="margin-bottom:7px;"><label for="nbEssai">Choisir le nombre d'essais non r&eacute;compens&eacute;s cons&eacute;cutifs : </label><input id="nbEssai" type="text" name="nbEssai" size="2"></div>
					<div style="margin-bottom:20px;"><label for="tacheDemotiv">Choisir la t&acirc;che de lutte contre le d&eacute;motivation : </label><select id="tacheDemotiv" name="tacheDemotiv">
					<?php
						for($i=0; $i<count($listeTask['id_tache']); $i++)
						{
							echo "<option value=".$listeTask['id_tache'][$i].">".$listeTask['nom_tache'][$i]."</option>";
						}
					?>
					</select></div>
					<b>T&acirc;ches de la session type:</b></br>
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
					<label for="inputTextNumberTasks1">Nombre : </label><input id="inputTextNumberTasks1" type="text" name="inputTextNumberTasks1" size="3" onkeypress="return validate(event);">
					<input class="valid" type='submit' value='Valider' onclick='return verifForm();' style="margin-left:30px;" >
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
		formSessionType.append('<label for="inputTextNumberTasks'+compteur+'">Nombre : </label><input id="inputTextNumberTasks'+compteur+'" type="text" name="inputTextNumberTasks'+compteur+'" size="3" onkeypress="return validate(event);"> </br>');

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
	
	
	function verifForm()
	{
		var res = false;
		
		var sessionTypeName = $('#inputTextSessionTypeName').val();

		if (sessionTypeName.length == 0)
		{
			res = false;
			alert("Attention : Vous devez renseigner tous les champs.");
		}
		// On check les champs de textes "nombre" de chaque t�che
		else
		{
			// On parcourt tous les champs de texte qui ont �t� cr�es
			for (var i = 1; i <= compteur - 1; i++)
			{
				var currentInputTextNumberTask = $('#inputTextNumberTasks'+i).val();

				// Si le nombre de t�ches n'est pas renseign�e
				if (currentInputTextNumberTask.length == 0)
				{
					alert("Attention : Vous devez renseigner tous les champs.");
					return false;
				}
			}

			// Si on est arriv� jusqu'ici, cela veut dire que tous les param�tres sont ok
			res = true;
		}

		return res;
	}
	
	// Contr�le des input texts, on s'assure de ne pouvoir donner que des chiffres
	function validate(evt) 
	{
		var theEvent = evt || window.event;
		var key = theEvent.keyCode || theEvent.which;

		// Si touche back space ou fl�che droite/gauche
		if (key == 8 || key == 37 || key == 38)
		{
			// On effectue le traitement normal
			return;
		}

		key = String.fromCharCode( key );

		var regex = /[0-9]|\./;

		if( !regex.test(key))
		{
			theEvent.returnValue = false;
			if(theEvent.preventDefault) theEvent.preventDefault();
		}
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