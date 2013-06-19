<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");

?>
		
	<div id="main">
	<h2 class="title">Cr&eacute;ation d'une t&acirc;che</h2>
	<hr id="under-title"/>
	
		<div class="box">
			<form style="margin-left:100px;" method="post" action="cps_new_tache_exec.php" onsubmit="return verifForm();">
				<table style="width:630px;" cellspacing="10px">
					<tr>
						<td><label>Nom de la t&acirc;che:</label></td>
						<td><input class="champs" name="task_name" type="text" value="" size="20" /></td>
					</tr>
					<tr>
						<td><label>Type de t&acirc;che:</label></td>
						<td><select class="liste" id="type_list" name="type_tache" size="1" onChange="affichage();" ></select></td>
					</tr>
				</table>
				
				<!-- Différents critères selon le type de tache voulu -->
				
				<!-- Tâche Training Program -->
				<table id="TP" style="width:550px; display:none;" cellspacing="10px">
					<tr>
						<td>De quelle mani&egrave;re lancer la t&acirc;che:</td>
						<td>
							<select class="liste" name="elemTP1">
								<option value="0">automatique</option>
								<option value="1">action sur le levier</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Temps inter-cibles de:</td>
						<td>
							<input style="margin-right:26px;" class="champs" name="elemTP2" type="text" value="" size="3" onkeypress="validate(event)" />&agrave;
							<input style="margin-left:28px; margin-right:15px;" class="champs" name="elemTP3" type="text" value="" size="3" onkeypress="validate(event)" />seconde(s)
						</td>
					</tr>
					<tr>
						<td>Temps de r&eacute;ponse maximum autoris&eacute;:</td>
						<td>
							<input style="margin-right:15px;" class="champs" name="elemTP4" type="text" value="" size="3" onkeypress="validate(event)" />seconde(s)
						</td>
					</tr>
					<tr>
						<td>Nombre d'essais:</td>
						<td>
							<input class="champs" name="elemTP5" type="text" value="" size="3" onkeypress="validate(event)" />
						</td>
					</tr>
					<tr>
						<td>Type de stimuli visuel:</td>
						<td>
							<select style="width:170px;" class="liste" name="elemTP6">
								<?php include("stimuli_figure.php"); ?>
							</select>
							<a href="#" onClick="pop()"><img style="width:30px; vertical-align:-10px;" src="images/loupe.png" /></a>
						</td>
					</tr>
					<!--<tr><td colspan="2"><a href="#" onClick="pop()">Cliquez ici pour avoir un aper&ccedil;u des images des stimulis !</a></td></tr>-->
					<tr>
						<td>Taille de d&eacute;part:</td>
						<td>
							<select style="width:90px;" class="liste" name="elemTP7">
								<option  value="0" >120 x 120</option>
								<option value="1" >240 x 240</option>
								<option value="2" >360 x 360</option>
								<option value="3" >480 x 480</option>
								<option value="4" >600 x 600</option>
								<option value="5" >800 x 675</option>
								<option value="6" >1000 x 750</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Taille de fin:</td>
						<td>
							<select style="width:90px;" class="liste" name="elemTP8">
								<option value="0" >120 x 120</option>
								<option value="1" >240 x 240</option>
								<option value="2" >360 x 360</option>
								<option value="3" >480 x 480</option>
								<option value="4" >600 x 600</option>
								<option value="5" >800 x 675</option>
								<option value="6" >1000 x 750</option>
							</select>
						</td>
					</tr>
				</table>
			

				<!-- Tâche DMS -->
				<table id="DMS" style="width:520px; display:none;" cellspacing="10px">
					<tr>
						<td>De quelle mani&egrave;re lancer la t&acirc;che:</td>
						<td>
							<select class="liste" name="elemDS1">
								<option value="0">automatique</option>
								<option value="1">action sur le levier</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Choix du temps de r&eacute;ponse max. autoris&eacute; pour r&eacute;pondre (phase 1):</td>
						<td>
							<input style="margin-right:15px;" class="champs" name="elemDS2" type="text" value="" size="3" onkeypress="validate(event)" />seconde(s)
						</td>
					</tr>
					<tr>
						<td>Choix du temps de r&eacute;ponse max. autoris&eacute; pour r&eacute;pondre (phase 2):</td>
						<td>
							<input style="margin-right:15px;" class="champs" name="elemDS3" type="text" value="" size="3" onkeypress="validate(event)" />seconde(s)
						</td>
					</tr>
					<tr>
						<td>Au cours de la phase 1:</td>
						<td>
							<select style="width:210px;" id="valid_cible" class="liste" name="elemDS4" onChange="affichage2();">
								<option value="1">validation cible en la touchant</option>
								<option value="0">presentation stimulus pendant un certain temps</option>
							</select>
						</td>
					</tr>
					<tr id="valid_temps" style="display:none;">
						<td>Temps de pr&eacute;sentation:</td>
						<td>
							<input style="margin-right:15px;" class="champs" name="elemDS5" type="text" value="" size="3" onkeypress="validate(event)" />seconde(s)
						</td>
					</tr>
					<tr>
						<td>Choix du temps de latence entre la phase 1 et la phase 2:</td>
						<td>
							<input style="margin-right:15px;" class="champs" name="elemDS6" type="text" value="" size="3" onkeypress="validate(event)" />seconde(s)
						</td>
					</tr>
					<tr>
						<td>Au cours de la phase 2:</td>
						<td>
							<select style="width:108px;" id="dms_dnms" class="liste" name="elemDS7" onChange="affichage3();">
								<option value="1">matching</option>
								<option value="0">non-matching</option>
							</select>
						</td>
					</tr>
					<tr id="distracteur" style="display:yes;">
						<td>Nombre de distracteur(s):</td>
						<td>
							<select style="width:40px;" class="liste" name="elemDS8">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Choix du dossier contenant les diff&eacute;rents stimuli visuels possibles:</td>
						<td>
							<select class="liste" name="elemDS9">
								<option value="7">camcog_mdms0</option>
								<option value="8">camcog_mdms5</option>
								<option value="9">camcog_mdms6</option>
								<option value="10">camcog_mdms7</option>
							</select>
						</td>
					</tr>
				</table>
			

				<!-- Tâche SOSS -->
				<table id="SOSS" style="width:530px; display:none;" cellspacing="10px">
					<tr>
						<td>De quelle mani&egrave;re lancer la t&acirc;che:</td>
						<td>
							<select class="liste" name="elemSO1">
								<option value="0">automatique</option>
								<option value="1">action sur le levier</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Choix du type de stimuli visuel:</td>
						<td style="width:220px;" >
							<select class="liste" name="elemSO2">
								<?php include("stimuli_figure.php"); ?>
							</select>
							<a href="#" onClick="pop()"><img style="width:30px; vertical-align:-10px;" src="images/loupe.png" /></a>
						</td>
					</tr>
					<!--<tr><td colspan="2"> <a href="#" onClick="pop()">Cliquez ici pour avoir un aper&ccedil;u des images des stimulis !</a></td></tr>-->
					<tr>
						<td>Choix du temps de r&eacute;ponse maximum autoris&eacute; pour r&eacute;pondre:</td>
						<td>
							<input style="margin-right:15px;" class="champs" name="elemSO3" type="text" value="" size="3" onkeypress="validate(event)" />seconde(s)
						</td>
					</tr>
					<tr>
						<td>Choix du nombre de stimuli visuel:</td>
						<td>
							<select class="liste" name="elemSO4">
								<option value="2" >2</option>
								<option value="3" >3</option>
								<option value="4" >4</option>
								<option value="6" >6</option>
								<option value="8" >8</option>
								<option value="10" >10</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Choix du temps de disparition des cibles apr&egrave;s un touch&eacute; r&eacute;ussi:</td>
						<td>
							<input style="margin-right:15px;" class="champs" name="elemSO5" type="text" value="" size="3" onkeypress="validate(event)" />seconde(s)
						</td>
					</tr>
					<tr>
						<td>Changer la couleur de la cible en cas de bonne r&eacute;ponse:</td>
						<td>
							<select id="color_cible" class="liste" name="elemSO6" onChange="affichage4();">
								<option value="0" >non</option>
								<option value="1" >oui</option>
							</select>
						</td>
					</tr>
					<tr id="color_time" style="display:none;">
						<td>Si oui pendant combien de temps:</td>
						<td>
							<input style="margin-right:15px;" class="champs" name="elemSO7" type="text" value="" size="3" onkeypress="validate(event)"/>seconde(s)
						</td>
					</tr>
					<tr id="color_figure" style="display:none;">
						<td>Stimuli marqueur:</td>
						<td>
							<select class="liste" name="elemSO8">
								<?php include("stimuli_figure.php"); ?>
							</select>
							<a href="#" onClick="pop()"><img style="width:30px; vertical-align:-10px;" src="images/loupe.png" /></a>
						</td>
					</tr>
					<tr>
						<td>Choisir de produire un son ou non en cas de bonne r&eacute;ponse:</td>
						<td>
							<select class="liste" name="elemSO9">
								<option value="0" >non</option>
								<option value="1" >oui</option>
							</select></td></tr>
					<tr>
						<td>Choisir de r&eacute;compenser:</td>
						<td>
							<select style="width:180px;" class="liste" name="elemSO10">
								<option value="0" >pour essai complet r&eacute;ussi</option>
								<option value="1" >pour chaque bonne r&eacute;ponse</option>
							</select>
						</td>
					</tr>
				</table>
				

				<!-- Tâche CSRT -->
				<table id="CSRT" style="width:510px; display:none;" cellspacing="10px">
					<tr>
						<td>De quelle mani&egrave;re lancer la t&acirc;che:</td>
						<td>
							<select class="liste" name="elemCS1">
							<option value="0">automatique</option>
							<option value="1">action sur le levier</option>
							<option value="2">toucher une cible au centre de l'ecran</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Choix du nombre de cibles potentielles:</td>
						<td>
							<select class="liste" name="elemCS2">
								<option value="0" >1 cible</option>
								<option value="3" >2 cibles</option>
								<option value="1" >3 cibles</option>
								<option value="2" >5 cibles</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Choix du temps de r&eacute;ponse max. autoris&eacute; pour r&eacute;pondre:</td>
						<td>
							<input style="margin-right:15px;" class="champs" name="elemCS3" type="text" value="" size="3" onkeypress="validate(event)"/>seconde(s)
						</td>
					</tr>
					<tr>
						<td>Choix du temps avant flash:</td>
						<td style="width:200px;">
							<input style="margin-right:15px;" class="champs" name="elemCS4" type="text" value="" size="3" onkeypress="validate(event)"/>&agrave;
							<input style="margin-left:15px; margin-right:5px;" class="champs" name="elemCS5" type="text" value="" size="3" onkeypress="validate(event)"/>seconde(s)
						</td>
					</tr>
					<tr>
						<td>Choix du temps de pr&eacute;sentation du stimulus:</td>
						<td>
							<input style="margin-right:15px;" class="champs" name="elemCS6" type="text" value="" size="3" onkeypress="validate(event)"/>seconde(s)
						</td>
					</tr>
					<tr>
						<td>Choix apr&egrave;s la premi&egrave;re r&eacute;ponse:</td>
						<td>
							<select id="response" class="liste" name="elemCS7" onChange="affichage5();">
								<option value="0" >rien</option>
								<option value="1" >punir une reponse perseverante</option>
								<option value="1" >permettre une reponse perseverante pendant x secondes</option>
							</select>
						</td>
					</tr>
					<tr id="response_time" style="display:none;">
						<td>Nombre de seconde(s) pour la r&eacute;ponse:</td>
						<td>
							<input style="margin-right:15px;" class="champs" name="elemCS8" type="text" value="" size="3" onkeypress="validate(event)"/>seconde(s)
						</td>
					</tr>
				</table>
			
				<!-- TODO : Tâche PAL -->
				<table id="PAL" style="width:400px; display:none;" cellspacing="10px">
					<tr>
						<td>Critere 1 PAL</td>
					</tr>
					<tr>
						<td>Critere 2 PAL</td>
					</tr>
					<tr>
						<td>Critere 3 PAL</td>
					</tr>
				</table>
				
				<!-- Fin des critères -->
					
				<input class="valid" type="submit" value="Valider" /></td>
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

<script type="text/javascript">

var affichage2isDisplay = false;
var affichage4isDisplay = false;
var affichage5isDisplay = false;

function affichage()
{
	var elem = $('#type_list option:selected').text();

	switch(elem)
	{
		case 'Training Program':
			$('#TP').show();
			$('#DMS').hide();
			$('#SOSS').hide();
			$('#CSRT').hide();
			$('#PAL').hide();
		break;
	
		case 'DMS / DNMS':
			$('#TP').hide();
			$('#DMS').show();
			$('#SOSS').hide();
			$('#CSRT').hide();
			$('#PAL').hide();
		break;
	
		case 'SOSS':
			$('#TP').hide();
			$('#DMS').hide();
			$('#SOSS').show();
			$('#CSRT').hide();
			$('#PAL').hide();
		break;
	
		case 'CSRT':
			$('#TP').hide();
			$('#DMS').hide();
			$('#SOSS').hide();
			$('#CSRT').show();
			$('#PAL').hide();
		break;
	
		case 'PAL':
			$('#TP').hide();
			$('#DMS').hide();
			$('#SOSS').hide();
			$('#CSRT').hide();
			$('#PAL').show();
		break;
	
		case '------':
			$('#TP').hide();
			$('#DMS').hide();
			$('#SOSS').hide();
			$('#CSRT').hide();
			$('#PAL').hide();
		break;
	
	}

}

function affichage2()
{
	var elem2 = $('#valid_cible option:selected').text();
	
	switch(elem2)
	{
		case 'validation cible en la touchant':
			$('#valid_temps').hide();
			affichage2isDisplay = false;
		break;
	
		case 'presentation stimulus pendant un certain temps':
			$('#valid_temps').show();
			affichage2isDisplay = true;
		break;
	}
}

function affichage3()
{
	var elem3 = $('#dms_dnms option:selected').text();
	
	switch(elem3)
	{
		case 'non-matching':
			$('#distracteur').hide();
		break;
	
		case 'matching':
			$('#distracteur').show();
		break;
	}
}

function affichage4()
{
	var elem4 = $('#color_cible option:selected').text();
	
	switch(elem4)
	{
		case 'non':
			$('#color_time').hide();
			$('#color_figure').hide();
			affichage4isDisplay = false;
		break;
	
		case 'oui':
			$('#color_time').show();
			$('#color_figure').show();
			affichage4isDisplay = true;
		break;
	}
}

function affichage5()
{
	var elem5 = $('#response option:selected').text();
	
	switch(elem5)
	{
		case 'rien':
			$('#response_time').hide();
			affichage5isDisplay = false;
		break;
	
		case 'punir une reponse perseverante':
			$('#response_time').hide();
			affichage5isDisplay = false;
		break;
		
		case 'permettre une reponse perseverante pendant x secondes':
			$('#response_time').show();
			affichage5isDisplay = true;
		break;
	}
}

function pop()
{
	window.open('stimuli_figure_image.php','popup','width=850,height=450,left=250,top=150,scrollbars=0');
}

// Vérification du formulaire d'ajout de tâches
function verifForm()
{
	var res = false;

	// Type tâche
	var currentElem = $('#type_list option:selected').text();

	// Champs du formulaire
	var taskName = $('input[name=task_name]').val();

	// Si le nom de la tâche n'est pas vide
	if (taskName.length != 0)
	{
		switch(currentElem)
		{
			case 'Training Program':

				// Vérifications des input
				var elemTP2 = $('input[name=elemTP2]').val();
				var elemTP3 = $('input[name=elemTP3]').val();
				var elemTP4 = $('input[name=elemTP4]').val();
				var elemTP5 = $('input[name=elemTP5]').val();

				if (elemTP2.length != 0 && elemTP3.length != 0 && elemTP4.length != 0 && elemTP5.length != 0)
				{
					res = true;
				}

			break;
		
			case 'DMS / DNMS':

				// Vérifications des input
				var elemDS2 = $('input[name=elemDS2]').val();
				var elemDS3 = $('input[name=elemDS3]').val();
				var elemDS5 = $('input[name=elemDS5]').val();
				var elemDS6 = $('input[name=elemDS6]').val();

				// Si la fonction affichage2 a été appelé, ça veut dire qu'il y a un input en plus
				if (affichage2isDisplay)
				{
					if (elemDS2.length != 0 && elemDS3.length != 0  && elemDS5.length != 0 && elemDS6.length != 0)
					{
						res = true;
					}
				}
				else
				{
					if (elemDS2.length != 0 && elemDS3.length != 0 && elemDS6.length != 0)
					{
						res = true;
					}
				}

			break;
		
			case 'SOSS':

				// Vérifications des input
				var elemSO3 = $('input[name=elemSO3]').val();
				var elemSO5 = $('input[name=elemSO5]').val();
				var elemSO7 = $('input[name=elemSO7]').val();

				// Si la fonction affichage4 a été appelé, ça veut dire qu'il y a un input en plus
				if (affichage4isDisplay)
				{
					if (elemSO3.length != 0 && elemSO5.length != 0  && elemSO7.length != 0)
					{
						res = true;
					}
				}
				else
				{
					if (elemSO3.length != 0 && elemSO5.length != 0)
					{
						res = true;
					}
				}

			break;
		
			case 'CSRT':

				// Vérifications des input
				var elemCS3 = $('input[name=elemCS3]').val();
				var elemCS4 = $('input[name=elemCS4]').val();
				var elemCS5 = $('input[name=elemCS5]').val();
				var elemCS6 = $('input[name=elemCS6]').val();
				var elemCS8 = $('input[name=elemCS8]').val();

				// Si la fonction affichage4 a été appelé, ça veut dire qu'il y a un input en plus
				if (affichage5isDisplay)
				{
					if (elemCS3.length != 0 && elemCS4.length != 0  && elemCS5.length != 0 && elemCS6.length != 0 && elemCS8.length != 0)
					{
						res = true;
					}
				}
				else
				{
					if (elemCS3.length != 0 && elemCS4.length != 0  && elemCS5.length != 0 && elemCS6.length != 0)
					{
						res = true;
					}
				}

			break;
		
			case 'PAL':

			break;
		
			case '------':

			break;
		
		}
	}
	else
	{
		res = false;
	}

	if (!res)
	{
		alert("Attention : Vous devez renseigner tous les champs.");
	}

	return res;
}

</script>