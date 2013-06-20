<?php session_start();

	function get_element($element, $elemno = 1) {
		global $xml;
		$elem = $xml->getElementsByTagName($element);
		return $elem->item($elemno - 1)->nodeValue;
	}

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");
			$afisare_dupa_modificare = true;
			//echo "<PRE>";print_r($_POST);
			$id = $_POST['idTache'];
			echo "<input type='hidden' name='taches' value='$id' />";
			// connexion
			include('connect.php');
			$conn=connect();
			// récupération des noms des tâches
		
			/************ 
			DE INLOCUIT cele 2 queries cu:
			
			select * from CPS_Taches t INNER JOIN CPS_Taches_Valides t1 ON t.task_type = t1.task_type WHERE id_tache = $id;
			
			**************/
			$query = "select * from CPS_Taches WHERE id_tache = $id";
			$rs = $conn->execute($query); 
			$type = 0;
			while(!$rs->EOF)
			{ 
			
				$id = $rs->Fields(0)->value;
				$nom = $rs->Fields(1)->value;
				$type_task = $rs->Fields(2)->value;
				$lien = $rs->Fields(3)->value;
				$date_creation = $rs->Fields(4)->value;				
				$rs->MoveNext();				
			}
						
							
			$rs3 = $conn->execute("SELECT Code_Fr FROM CPS_Taches_Valides WHERE task_type = $type_task");
			while (!$rs3->EOF) {
					$type = $rs3->Fields(0)->value;
					//echo '<tr><td colspan="2">&raquo; '."Code FR: ".$type.'</td></tr>';
					$rs3->MoveNext();
					}
			
			
			
							
			//$namefile - need in TP.php or SOSS.php, etc........ pour le fichier .xml
			$namefile = substr($lien, strlen('resultats/'), -strlen('.xml'));

	//echo '<tr><td colspan="2">&raquo; "Code FR: CUCU 1"</td></tr>';

			if(isset($_POST['elemTP1']) || isset($_POST['elemDS1']) || isset($_POST['elemSO1']) || isset($_POST['elemCS1']))
			{
				
	//echo '<tr><td colspan="2">&raquo; "Code FR: CUCU 2"</td></tr>';

				if($type == "Training Program") 
				{
					$j = 8;
					$t = "TP";
				}
				else if($type == "DMS / DNMS") //DMS
				{
					$j = 9;
					$t = "DS";
				}
				else if($type == "SOSS") //SOSS
				{echo '<tr><td colspan="2">&raquo; "SOSS"</td></tr>';
					$j = 10;
					$t = "SO";
				}
				else if($type == "CSRT") //CSRT
				{
					$j = 8;
					$t = "CS";
				}
				else if($type == "PAL") //PAL
				{
					//$j = 8;
					//$t = "CS";
				}
				
				// récupération des éléments du formulaire
				for($i = 1; $i <= $j; $i++)
				{
					if(isset($_POST['elem'.$t.$i]))
					{
						$elem[$i] = $_POST['elem'.$t.$i];
					}
					else
					{
						$elem[$i] = "";
					}
					echo "Elem".$i." din ".$t." = ".$elem[$i].'</br>';
				}
				
				$success = true;
			//pour les taches de tip 3 (Training Program)
				if($type == "Training Program") //TP
				{
				
				//validation 
				 for ($i = 2; $i <= 5; $i++ ) {
						$elem[$i] = trim($elem[$i]);
						if (!preg_match('/^\d+$/', $elem[$i])) {
							$success = false;							
							echo "<span style='font-size:18px; color:red;'>Elem[$i] doit etre positif!<br /></span>";
						}
					}
					if ($elem[2] > $elem[3]) {
						$success = false;
						echo "<span style='font-size:18px; color:red;'>Elem[2] doit etre plus petit que elem[3]<br /></span>";
					}	
					
					//les éléments du formulaire corecte -> sauvegarder en le fis. .xml (scriu peste cel existent)
					if ($success) {					
						include("TP.php");
					}
				}
				//pour les taches de tip 7 (DMS / DNMS)	
				else if($type == "DMS / DNMS") //DMS / DNMS
				{
					//validation 
					foreach(array(2,3,5,6) as $i) {
						$elem[$i] = trim($elem[$i]);
						if (!preg_match('/^\d+$/', $elem[$i])) {
							$success = false;							
							echo "<span style='font-size:18px; color:red;'>Elem[$i] doit etre positif!<br /></span>";
						}
					}
					if($elem[7] == 0)   //DNMS (no-matching)
					{
						//les éléments du formulaire corecte -> sauvegarder en le fis. .xml 
						if ($success) {
							include("DNMS.php");  
						}
					}
					//DMS (matching) avec 1, 2 ou 3 distracteurs
					elseif($success)
					{ 
						if($elem[8] == 1)    	//DMS (matching) avec 1 distracteur
						{
							include("DMS_1.php");
						}
						else if($elem[8] == 2)	//DMS (matching) avec 2 distracteurs
						{
							include("DMS_2.php");
						}
						else if($elem[8] == 3)	//DMS (matching) avec 3 distracteurs
						{
							include("DMS_3.php");
						}
					}
				}
				else if($type == "SOSS") // "SOSS"
				{
					//validation 
					foreach(array(3,5,7) as $i) {
						$elem[$i] = trim($elem[$i]);
						if (!preg_match('/^\d+$/', $elem[$i])) {
							$success = false;							
							echo "<span style='font-size:18px; color:red;'>Elem[$i] doit etre positif!<br /></span>";
						}
					}
					if($elem[6] == 0 && $success)
					{
						//Valorile default, desi ele nu sunt folosite in SOSS.php.
						$elem[7] = 1;
						$elem[8] = 'univcam_IDED_shape_21';
						include("SOSS.php");
					}
					else if($elem[6] == 1 && $success)
					{
						include("SOSS_M.php");
					}
				}
				else if($type == "CSRT") //"CSRT"
				{
					//validation 
					foreach(array(3,4,5,6) as $i) {
						$elem[$i] = trim($elem[$i]);
						if (!preg_match('/^\d+$/', $elem[$i])) {
							$success = false;							
							echo "<span style='font-size:18px; color:red;'>Elem[$i] doit etre positif!<br /></span>";
						}
					}
					if ($elem[4] > $elem[5]) {
						$success = false;
						echo "<span style='font-size:18px; color:red;'>Elem[2] doit etre plus petit que elem[3]<br /></span>";
					}
					//Cand elementul 7 este permetter une response, trebuie sa validam secundele. altfel e campul gol.
					if ($elem[7] == 2) {
						$elem[8] = trim($elem[8]);
						if (!preg_match('/^\d+$/', $elem[8])) {
								$success = false;							
								echo "<span style='font-size:18px; color:red;'>Elem[8] doit etre positif!<br /></span>";
						}
					} else {
						$elem[8] = "";
					}

					if($elem[2] == 0 && $success)
					{
						include("CSRT_1.php");
					}
					else if($elem[2] == 1 && $success)
					{
						include("CSRT_3.php");
					}
					else if($elem[2] == 2 && $success)
					{
						include("CSRT_5.php");
					}
					else if($elem[2] == 3 && $success)
					{
						include("CSRT_2.php");
					}
				}
				else if($type == "PAL") //"PAL"
				{
				
				}
				if ($success) {
					$data = date('n/j/Y', time());
					$query2 = "update CPS_Taches SET date_modification_tache='".$data."' WHERE id_tache=".$id."";
					echo "<span style='font-size:18px; color:black;'>Modification de la t&acirc;che correctement &eacute;ffectu&eacute;e !</span>";
					$rs = $conn->execute($query2);
					$afisare_dupa_modificare = false; //nu mai afisez macheta de culegere date (valorile ptr datele de modificat au fost corecte!)
				} else {
					echo "<span style='font-size:18px; color:red;'>Au fost erori!</span>";
				}
	
		}
		

	if ($afisare_dupa_modificare) {
?>

	<div id="main">
	<h2 class="title">Modification d'une t&acirc;che</h2>
	<hr id="under-title"/>

		<div class="box">
			<form style="margin-left:100px;" method="post" action="cps_upd_tache_exec.php">
				<?php
				echo "<input type='hidden' name='idTache' value='$id' />";
				
				$xml = new DOMDocument();
				$xml->load($lien);
				
				
				if ($type == "Training Program") {
				//read from file .xml "champs"
				$elem2 = get_element("m_fMinIntertrialTimeSec");
				$elem3 = get_element("m_fMaxIntertrialTimeSec");
				$elem4 = get_element("m_fResponseCriterionTimeSec");
				$elem5 = get_element("m_iMaxTrials");
				
					//$query = "select * from TouchTraining_Config WHERE _RecordNum = $id";
					//$rs = $conn->execute($query); 
				?>
				
				<table id="TP" style="width:545px;" cellspacing="10px"> 
				    <tr><td>De quelle mani&egrave;re lancer la t&acirc;che:</td><td>
					<?php
						$elem1 = get_element("m_iInitiationMethod");
						echo '<select class="liste" name="elemTP1">';
						$optiuni = array(0 => 'automatique', 1 => 'action sur le levier');
						foreach ($optiuni as $index => $afisare) {
							$test = $elem1 == $index ? " selected='selected'" : "";
							echo "<option value='$index'$test>$afisare</option>";
						}
						echo '</select>';	  
					?>  
					  
					  
					<tr><td>Temps inter-cibles de:</td><td><input style="margin-right:26px;" class="champs" name="elemTP2" type="text" value="<?php echo $elem2; ?>" size="3" />&agrave;<input style="margin-left:28px; margin-right:15px;" class="champs" name="elemTP3" type="text" value="<?php echo $elem3; ?>" size="3" />seconde(s)</td></tr>
					<tr><td>Temps de r&eacute;ponse maximum autoris&eacute;:</td><td><input style="margin-right:15px;" class="champs" name="elemTP4" type="text" value="<?php echo $elem4; ?>" size="3" />seconde(s)</td></tr>
					<tr><td>Nombre d'essais:</td><td><input class="champs" name="elemTP5" type="text" value="<?php echo $elem5; ?>" size="3" /></td></tr>
					
					<tr><td>Type de stimuli visuel:</td><td> 
					<?php
						
						//$elem6 = substr(get_element("m_strStimulus"), strlen('univcam_'));  //am eliminat sirul "univcam_" pe care il scriu in .xml (univcam_IDED_shape30)
						//echo $elem6;   //DE COMENTAT
						$elem6 = get_element("m_strStimulus");
						echo '<select class="liste" name="elemTP6">';
						$optiuni1 = array(1 =>'IDED_shape_1', 2 => 'IDED_shape_2', 'IDED_shape_3', 
						'IDED_shape_4', 'IDED_shape_5', 'IDED_shape_6', 'IDED_shape_7', 'IDED_shape_8', 
						'IDED_shape_9', 'IDED_shape_10', 'IDED_shape_11', 'IDED_shape_12', 'IDED_shape_13', 
						'IDED_shape_14', 'IDED_shape_15', 'IDED_shape_16', 'IDED_shape_17', 'IDED_shape_18', 
						'IDED_shape_19', 'IDED_shape_20','IDED_shape_21', 'IDED_shape_22', 'IDED_shape_23', 
						'IDED_shape_24', 'IDED_shape_25', 'IDED_shape_26', 'IDED_shape_27', 'IDED_shape_28', 
						'IDED_shape_29','IDED_shape_30', 'IDED_shape_31', 'IDED_shape_32', 'IDED_shape_33', 
						'IDED_shape_34', 'IDED_shape_35', 'IDED_shape_36', 'IDED_shape_37', 'IDED_shape_38', 
						'IDED_shape_39','IDED_shape_40', 'IDED_shape_41', 'IDED_shape_42', 'IDED_shape_43'	);						
																	
						//foreach ($optiuni1 as $value => $afisare) {								
							//$test = $elem6 == $afisare ? " selected='selected'" : "";														
						foreach ($optiuni1 as $index => $afisare) {								
							$test = $elem6 == $afisare ? " selected='selected'" : "";		
							echo "<option value='$afisare'$test> $afisare </option>";
						}
						echo '</select>';	  
					?>  
										
					<tr><td colspan="2"> <a href="#" onClick="pop()">Cliquez ici pour avoir un aper&ccedil;u des images des stimulis !</a></td></tr>
					
					<tr><td>Taille de d&eacute;part:</td><td>
					<?php
						$elem7 = get_element("m_iStartingSize");
						echo '<select class="liste" name="elemTP7">';
						$optiuni2 = array(0 =>'120 x 120', '240 x 240', '360 x 360', '480 x 480','600 x 600', '800 x 675', '1000 x 750');
						foreach ($optiuni2 as $index => $afisare) {
							$test = $elem7 == $index ? " selected='selected'" : "";							
							echo "<option value='$index'$test> $afisare </option>";
						}
						echo '</select>';
					
					
					?>
							
					
					</td></tr>
					<tr><td>Taille de fin:</td><td>
					<?php
						$elem8 = get_element("m_iFinalSize");
						echo '<select class="liste" name="elemTP8">';
						$optiuni3 = array(0 =>'120 x 120', '240 x 240', '360 x 360', '480 x 480','600 x 600', '800 x 675', '1000 x 750');
						foreach ($optiuni3 as $index => $afisare) {
							$test = $elem8 == $index ? " selected='selected'" : "";							
							echo "<option value='$index'$test> $afisare </option>";
						}
						echo '</select>';
										
					?>
				</table>
<?php
				} elseif ($type == "DMS / DNMS") {
					//read from file .xml "champs"
					$elem2 = get_element("m_fMaxResponseTimePhase1Sec");
					$elem3 = get_element("m_fMaxResponseTimePhase2Sec");
					$elem6 = get_element('Level_0_Delay');
										
?>

				<table id="DMS" style="width:520px;" cellspacing="10px">
					<tr><td>De quelle mani&egrave;re lancer la t&acirc;che:</td><td>
					<?php
					$elem1 = get_element("m_iInitiationMethod");
					echo '<select class="liste" name="elemDS1">';
						$optiuni = array(0 => 'automatique', 1 => 'action sur le levier');
						foreach ($optiuni as $index => $afisare) {
							$test = $elem1 == $index ? " selected='selected'" : "";
							echo "<option value='$index'$test>$afisare</option>";
						}
						echo '</select>';	  
					?>  
					
					
					<tr><td>Choix du temps de r&eacute;ponse max. autoris&eacute; pour r&eacute;pondre (phase 1):</td><td><input style="margin-right:15px;" class="champs" name="elemDS2" type="text" value="<?php echo $elem2; ?>" size="3" />seconde(s)</td></tr>
					<tr><td>Choix du temps de r&eacute;ponse max. autoris&eacute; pour r&eacute;pondre (phase 2):</td><td><input style="margin-right:15px;" class="champs" name="elemDS3" type="text" value="<?php echo $elem3; ?>" size="3" />seconde(s)</td></tr>
					
					
					
					<tr><td>Au cours de la phase 1:</td><td>
					<?php
						$elem4 = get_element("m_bMustTouchPhase1Stimulus");
						echo '<select class="liste" name="elemDS4" onChange="affichage2();" id="valid_cible">';
						$optiuni = array(0 => 'presentation stimulus pendant un certain temps', 1 => 'validation cible en la touchant');
						foreach ($optiuni as $index => $afisare) {
							$test = $elem4 == $index ? " selected='selected'" : "";
							echo "<option value='$index'$test>$afisare</option>";
						}
						echo "</select>\n";
						$test_initial = $elem4 == 0 ? "" : " style='display: none;'";
						$elem5 = get_element("m_fPhase1StimDurIfNoTouchReqdSec");

					?>
					<tr id="valid_temps"<?php echo $test_initial; ?>><td>Temps de pr&eacute;sentation:</td><td><input style="margin-right:15px;" class="champs" name="elemDS5" type="text" value="<?php echo $elem5; ?>" size="3" />seconde(s)</td></tr>
					<tr><td>Choix du temps de latence entre la phase 1 et la phase 2:</td><td><input style="margin-right:15px;" class="champs" name="elemDS6" type="text" value="<?php echo $elem6; ?>" size="3" />seconde(s)</td></tr>
					
					<tr><td>Au cours de la phase 2:</td><td>
					<?php
						$elem7 = get_element("m_bMatching");
						echo '<select class="liste" name="elemDS7"  id="dms_dnms" onChange="affichage3();">';
						$optiuni = array(0 => 'non-matching', 1 => 'matching');
						foreach ($optiuni as $index => $afisare) {
							$test = $elem7 == $index ? " selected='selected'" : "";
							echo "<option value='$index'$test>$afisare</option>";
						}
						echo '</select>';
						$initial_distr = $elem7 == 0 ? 'none' : 'yes';
						
					//TODO:  Elem 8 not saved anywere, not ion BD, not in xlm, 
					?>
					
					<tr id="distracteur" style="display: <?php echo $initial_distr; ?>;"><td>Nombre de distracteur(s):</td><td><select style="width:40px;" class="liste" name="elemDS8">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option></select></td></tr>
					
					
					<tr><td>Choix du dossier contenant les diff&eacute;rents stimuli visuels possibles:</td><td>
					<?php
					$elem9 = get_element("m_iStimulusSet");
					echo '<select class="liste" name="elemDS9">';
					$optiuni = array(7 => 'camcog_mdms0', 8 => 'camcog_mdms5', 'camcog_mdms6', 'camcog_mdms7');

					foreach ($optiuni as $index => $afisare) {
						$test = $elem9 == $index ? " selected='selected'" : "";
						echo "<option value='$index'$test>$afisare</option>";
					}
					echo '</select>';
					
					?></td></tr>
					
				</table>
<?php
				} elseif ($type == "SOSS") {
				/*
					SOSS 2 types
					- m_bMarkResponsesVisual = 0 - SOSS.php
					- m_bMarkResponsesVisual = 1 - SOSS_M.php
				*/
				$tip_soss = get_element('m_bMarkResponsesVisual');
				$elem1 = get_element('m_bRequireLeverToStartTrials');
				$elem2 = get_element('m_strMainObject');
				$elem3 = get_element('m_fMaxResponseTimeSec');
				$elem4 = get_element('m_iStartingNumStimuli');
				$elem5 = get_element('m_fBlankScreenTimeSec');
				//$elem6 = get_element('Level_0_Delay');
				$elem7 = get_element('m_fVisualMarkerTimeSec');  //Doar pentru SOSS_M.php; la SOSS.php este 1
				$elem8 = get_element('m_strVisualMarkerObject'); //Doar pentru SOSS_M.php; la SOSS.php este univcam_IDED_shape_21
				$elem9 = get_element('m_bMarkResponsesAural');
				$elem10= get_element('m_bRewardEveryCorrectTouch');
				if ($tip_soss == 0) {
					$elem7 = 1;
					$elem8 = 'IDED_shape_21'; 
					/* desi in xml-ul SOSS.php el apare ca univcam_IDED_shape_21, in lista stimuli_figuri.php originala nu 
					exista univcam_IDED_shape_21 ci doar IDED_shape21. Oricum, automat el este salvat tot ca univcam_IDED_shape_21 atunci
					cand suntem in modul SOSS.php
					*/
				
				}
?>
				<table id="SOSS" style="width:487px;" cellspacing="10px">
					<tr><td>De quelle mani&egrave;re lancer la t&acirc;che:</td><td>
					<?php
					echo '<select class="liste" name="elemSO1">';
					$optiuni = array(0 => 'automatique', 1 => 'action sur le levier');
					foreach ($optiuni as $index => $afisare) {
						$test = $elem1 == $index ? " selected='selected'" : "";
						echo "<option value='$index'$test>$afisare</option>";
					}
					echo '</select>';
					?>
					</td></tr>
					<tr><td>Choix du type de stimuli visuel:</td><td>
					<?php
					//ATENTIE
					//ATENTIE
					//ATENTIE
					//ATENTIE modified in stimuli_figure.php
					//ATENTIE
					//ATENTIE
					//ATENTIE
					$stimul_selectat = $elem2;
					echo '<select class="liste" name="elemSO2">';
					include("stimuli_figure.php");
					echo '</select>';
					?>
					</td></tr>
					<tr><td colspan="2"> <a href="#" onClick="pop()">Cliquez ici pour avoir un aper&ccedil;u des images des stimulis !</a></td></tr>
					<tr><td>Choix du temps de r&eacute;ponse maximum autoris&eacute; pour r&eacute;pondre:</td><td><input style="margin-right:15px;" class="champs" name="elemSO3" type="text" value="<?php echo $elem4; ?>" size="3" />seconde(s)</td></tr>
					<tr><td>Choix du nombre de stimuli visuel:</td><td>
					<?php
					echo '<select class="liste" name="elemSO4">';
					$optiuni = array(2 => 2, 3 => 3, 4 => 4, 6 => 6, 8 => 8, 10 => 10);
					foreach ($optiuni as $index => $afisare) {
						$test = $elem4 == $index ? " selected='selected'" : "";
						echo "<option value='$index'$test>$afisare</option>";
					}
					echo '</select>';
					?>
					</td></tr>
					<tr><td>Choix du temps de disparition des cibles apr&egrave;s un touch&eacute; r&eacute;ussi:</td><td><input style="margin-right:15px;" class="champs" name="elemSO5" type="text" value="<?php echo $elem5; ?>" size="3" />seconde(s)</td></tr>
					<tr><td>Changer la couleur de la cible en cas de bonne r&eacute;ponse:</td><td>
					<?php
					echo '<select id="color_cible" class="liste" name="elemSO6" onChange="affichage4();">';
					$optiuni = array(0 => 'non', 1 => 'oui');
					foreach ($optiuni as $index => $afisare) {
						$test = $tip_soss == $index ? " selected='selected'" : "";
						echo "<option value='$index'$test>$afisare</option>";
					}
					echo '</select>';
					$display_sossm = $tip_soss ? 'yes' : 'none';
					?>
					</td></tr>
					<tr id="color_time" style="display: <?php echo $display_sossm; ?>;"><td>Si oui pendant combien de temps:</td><td><input style="margin-right:15px;" class="champs" name="elemSO7" type="text" value="<?php echo $elem7; ?>" size="3" />seconde(s)</td></tr>
					<tr id="color_figure" style="display: <?php echo $display_sossm; ?>;"><td>Stimuli marqueur:</td><td><select class="liste" name="elemSO8"><?php $stimul_selectat = $elem8; include("stimuli_figure.php"); ?></select></td></tr>
					<tr><td>Choisir de produire un son ou non en cas de bonne r&eacute;ponse:</td><td>
					<?php
					echo '<select class="liste" name="elemSO9">';
					$optiuni = array(0 => 'non', 1 => 'oui');
					foreach ($optiuni as $index => $afisare) {
						$test = $elem9 == $index ? " selected='selected'" : "";
						echo "<option value='$index'$test>$afisare</option>";
					}
					echo '</select>';
					?>
					</td></tr>
					<tr><td>Choisir de r&eacute;compenser:</td><td>
					<?php
					echo '<select style="width:180px;" class="liste" name="elemSO10">';
					$optiuni = array(0 => 'pour essai complet r&eacute;ussi', 1 => 'pour chaque bonne r&eacute;ponse');
					foreach ($optiuni as $index => $afisare) {
						$test = $elem10 == $index ? " selected='selected'" : "";
						echo "<option value='$index'$test>$afisare</option>";
					}
					echo '</select>';
					?>
					</td></tr>
				</table>
<?php
				} elseif ($type == "CSRT") {
				/*
					CSRT e de 4 tipuri
					- m_locset_phase2 > Location_0_X = 500 - CSRT_1.php
					- m_locset_phase2 > Location_0_X = 250 - CSRT_2.php
					- m_locset_phase2 > Location_0_X = 183 - CSRT_3.php
					- m_locset_phase2 > Location_0_X = 505 - CSRT_5.php
				*/
				//
				// MODIFICAT TOATE CSRT_x.php si inlocuit é din SummaryFile cu &#201; pentru a fi valid UTF-8.
				//
				//
				$tip_csrt = get_element('Location_0_X', 2);
				//$elem1 = get_element(''); //TODO: absent
				switch ($tip_csrt) {
					case 500:
						$elem2 = 0;
						break;
					case 250:
						$elem2 = 3;
						break;
					case 183:
						$elem2 = 1;
						break;
					case 505:
						$elem2 = 2;
						break;
				}
				$elem3 = get_element('m_fPhase1MaxResponseTimeSec');
				$elem4 = get_element('m_fDelayMinSec');
				$elem5 = get_element('m_fDelayMaxSec');
				$elem6 = get_element('m_fStimulusDurationStartWithSec');
				$elem7 = get_element('m_bPermitPerseverative');
				$elem8 = get_element('m_fPerseverativeTimeSec');
?>
				<table id="CSRT" style="width:507px;" cellspacing="10px">
					<tr><td>De quelle mani&egrave;re lancer la t&acirc;che:</td><td>
					<?php
					//TODO: OBS: elem1 nu este salvat nicaieri!!! default punem 0.
					$elem1 = 0;
					echo '<select class="liste" name="elemCS1">';
					$optiuni = array(0 => 'automatique', 1 => 'action sur le levier', "toucher une cible au centre de l'ecran");
					foreach ($optiuni as $index => $afisare) {
						$test = $elem1 == $index ? " selected='selected'" : "";
						echo "<option value='$index'$test>$afisare</option>";
					}
					echo '</select>';
					?>
					</td></tr>
					<tr><td>Choix du nombre de cibles potentielles:</td><td>
					<?php
					echo '<select class="liste" name="elemCS2">';
					$optiuni = array(0 => '1 cible', 3 => '2 cibles', 1 => '3 cibles', 2 => '5 cibles');
					foreach ($optiuni as $index => $afisare) {
						$test = $elem2 == $index ? " selected='selected'" : "";
						echo "<option value='$index'$test>$afisare</option>";
					}
					echo '</select>';
					?>
					</td></tr>
					<tr><td>Choix du temps de r&eacute;ponse max. autoris&eacute; pour r&eacute;pondre:</td><td><input style="margin-right:15px;" class="champs" name="elemCS3" type="text" value="<?php echo $elem3; ?>" size="3" />seconde(s)</td></tr>
					<tr><td>Choix du temps avant flash:</td><td style="width:200px;"><input style="margin-right:15px;" class="champs" name="elemCS4" type="text" value="<?php echo $elem4; ?>" size="3" />&agrave;<input style="margin-left:15px; margin-right:5px;" class="champs" name="elemCS5" type="text" value="<?php echo $elem5; ?>" size="3" />seconde(s)</td></tr>
					<tr><td>Choix du temps de pr&eacute;sentation du stimulus:</td><td><input style="margin-right:15px;" class="champs" name="elemCS6" type="text" value="<?php echo $elem6; ?>" size="3" />seconde(s)</td></tr>
					<tr><td>Choix apr&egrave;s la premi&egrave;re r&eacute;ponse:</td><td>
					<?php
					echo '<select id="response" class="liste" name="elemCS7" onChange="affichage5();">';
					$optiuni = array(0 => 'rien', 1 => 'punir une reponse perseverante', 2 => 'permettre une reponse perseverante pendant x secondes');
					foreach ($optiuni as $index => $afisare) {
						$test = $elem7 == $index ? " selected='selected'" : "";
						echo "<option value='$index'$test>$afisare</option>";
					}
					echo '</select>';
					$display_response = $elem7 == 2 ? 'yes' : 'none';
					?>
					</td></tr>
					<tr id="response_time" style="display: <?php echo $display_response; ?>"><td>Nombre de seconde(s) pour la r&eacute;ponse:</td><td><input style="margin-right:15px;" class="champs" name="elemCS8" type="text" value="<?php echo $elem8; ?>" size="3" />seconde(s)</td></tr>
				</table>
<?php
				} elseif ($type == "PAL") {
?>
				<table id="PAL" style="width:400px;" cellspacing="10px">
					<tr><td>Critere 1 PAL</td></tr>
					<tr><td>Critere 2 PAL</td></tr>
					<tr><td>Critere 3 PAL</td></tr>
				</table>
<?php
				}
?>
				<input class="valid" type="submit" value="Valider" /></td>
			</form>
		</div>
<?php
	}  if ($afisare_dupa_modificare == true) {
?>
		<a class="back" href="cps_upd_tache.php">Retour</a>
			
<?php
		}
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
function pop()
{
	window.open('stimuli_figure_image.php','popup','width=850,height=450,left=250,top=150,scrollbars=0');
}

function affichage2()
{
	var elem2 = $('#valid_cible option:selected').text();
	//alert(elem2);
	switch(elem2)
	{
		case 'validation cible en la touchant':
			$('#valid_temps').hide();
		break;
	
		case 'presentation stimulus pendant un certain temps':
			$('#valid_temps').show();
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
		break;
	
		case 'oui':
			$('#color_time').show();
			$('#color_figure').show();
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
		break;
	
		case 'punir une reponse perseverante':
			$('#response_time').hide();
		break;
		
		case 'permettre une reponse perseverante pendant x secondes':
			$('#response_time').show();
		break;
	}
}

</script>
