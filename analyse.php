<?php session_start();

include('connect.php');

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");
			
			//if($_SESSION["type_tache"] == "Training Program")
			//{
				if(isset($_POST['param1']) && isset($_POST['param2']) && isset($_POST['param3']) && isset($_POST['param4']) && isset($_POST['param5']) && isset($_POST['param6']) && isset($_POST['param7']))
				{
					$param1 = $_POST['param1'];
					$param2 = $_POST['param2'];
					$param3 = $_POST['param3'];
					$param4 = $_POST['param4'];
					$param5 = $_POST['param5'];
					$param6 = $_POST['param6'];
					$param7 = $_POST['param7'];
				}
				else
				{
					$param1 = '';
					$param2 = '';
					$param3 = '';
					$param4 = '';
					$param5 = '';
					$param6 = '';
					$param7 = '';
				}
			/*}
			else
			{
				$param1 = '';
				$param2 = '';
				$param3 = '';
				$param4 = '';
				$param5 = '';
				$param6 = '';
				$param7 = '';
			}*/
	
			//echo $param1.' '.$param2.' '.$param3.' '.$param4.' '.$param5.' '.$param6.' '.$param7;
		
			//connection
			$conn = connect();
		
			$query = "select nom_tache from CPS_Taches where nom_tache='".$_SESSION['name']."'";
			$rs = $conn->execute($query); 

			if(!$rs->EOF)
			{ 
				$result = $rs->Fields(0)->value;
				$exist = "present";
			}
			else
			{
				$exist = "non present";
			}

			//echo $exist;
			
			// Creation du fichier
			if (!$file = fopen("resultats/".$_SESSION['name'].".xml","w+")) 
			{
				echo "Echec de l'ouverture du fichier";
			}
			else 
			{
				$str = 
"<MonkeyCantab>
<Version>MonkeyCantab configuration v8.6</Version>
<GeneralParameters>
	<BackgroundBlue>0</BackgroundBlue>
	<BackgroundGreen>0</BackgroundGreen>
	<BackgroundRed>0</BackgroundRed>
		<Comment>MonkeyCantab Test Commentaire</Comment>
		<Database>Maimuta</Database>
			<DisableHouselightDuringTasks>0</DisableHouselightDuringTasks>
			<LinkDuration>20</LinkDuration>
			<LinkUseHouselight>0</LinkUseHouselight>
			<MaxTimeToWaitForFingerRemovalSec>0</MaxTimeToWaitForFingerRemovalSec>
			<MediaDirectory></MediaDirectory>
			<NumModules>1</NumModules>
			<NumObjects>0</NumObjects>
			<OverallMaxRewards>0</OverallMaxRewards>
			<RespondToMouse>0</RespondToMouse>
			<Session>1</Session>
			<StartWithLink>0</StartWithLink>
			<StrictTouches>0</StrictTouches>
				<Subject>1</Subject>
					<SummaryFile>MonkeyCantab-result-test.txt</SummaryFile>
						<DefaultReward>
						<m_bDarkness>0</m_bDarkness>
						<m_bDatabaseConsidersThisReward>1</m_bDatabaseConsidersThisReward>
						<m_bExtraPunishmentDevice>0</m_bExtraPunishmentDevice>
						<m_bExtraRewardDevice>0</m_bExtraRewardDevice>
						<m_bGivePellet>0</m_bGivePellet>
						<m_bGivePump>1</m_bGivePump>
						<m_bGivePump2>0</m_bGivePump2>
						<m_bGiveVisualStimulus>0</m_bGiveVisualStimulus>
						<m_bPump2Contingent>1</m_bPump2Contingent>
						<m_bPumpContingent>1</m_bPumpContingent>
						<m_bUseMagazineLamp>0</m_bUseMagazineLamp>
						<m_bUseReinforcementInfoLine>1</m_bUseReinforcementInfoLine>
						<m_dwPelletPulseLengthMs>45</m_dwPelletPulseLengthMs>
						<m_dwReinforcementInfoLinePulseMs>10</m_dwReinforcementInfoLinePulseMs>
						<m_fDarknessTimeSec>10</m_fDarknessTimeSec>
						<m_fExtraPunishmentDeviceDurationSec>5</m_fExtraPunishmentDeviceDurationSec>
						<m_fExtraRewardDeviceDurationSec>5</m_fExtraRewardDeviceDurationSec>
						<m_fInterPelletGapSec>0.5</m_fInterPelletGapSec>
						<m_fPump2ContPumpTimeSec>1</m_fPump2ContPumpTimeSec>
						<m_fPump2DurationSec>5</m_fPump2DurationSec>
						<m_fPumpContPumpTimeSec>1</m_fPumpContPumpTimeSec>
						<m_fPumpDurationSec>5</m_fPumpDurationSec>
						<m_fVisualStimulusDurationSec>2</m_fVisualStimulusDurationSec>
						<m_fVisualStimulusOffTimeSec>0.5</m_fVisualStimulusOffTimeSec>
						<m_fVisualStimulusOnTimeSec>0.5</m_fVisualStimulusOnTimeSec>
						<m_iPelletsPerReinf>1</m_iPelletsPerReinf>
						<m_iVisualStimulusXCoord>500</m_iVisualStimulusXCoord>
						<m_iVisualStimulusYCoord>375</m_iVisualStimulusYCoord>
						<m_strVisualStimulusName></m_strVisualStimulusName>
						<m_sound>
						<m_bPlaySound>1</m_bPlaySound>
						<m_bSoundIsWav>0</m_bSoundIsWav>
						<m_enumSoundType>1</m_enumSoundType>
						<m_fSoundDurationSec>1</m_fSoundDurationSec>
						<m_iSoundFrequencyHz>1000</m_iSoundFrequencyHz>
						<m_iSoundLevelDb>85</m_iSoundLevelDb>
						<m_strSoundFile></m_strSoundFile>
						</m_sound>
						</DefaultReward>
						<DefaultPunishment>
						<m_bDarkness>1</m_bDarkness>
						<m_bDatabaseConsidersThisReward>0</m_bDatabaseConsidersThisReward>
						<m_bExtraPunishmentDevice>0</m_bExtraPunishmentDevice>
						<m_bExtraRewardDevice>0</m_bExtraRewardDevice>
						<m_bGivePellet>0</m_bGivePellet>
						<m_bGivePump>0</m_bGivePump>
						<m_bGivePump2>0</m_bGivePump2>
						<m_bGiveVisualStimulus>0</m_bGiveVisualStimulus>
						<m_bPump2Contingent>1</m_bPump2Contingent>
						<m_bPumpContingent>1</m_bPumpContingent>
						<m_bUseMagazineLamp>0</m_bUseMagazineLamp>
						<m_bUseReinforcementInfoLine>1</m_bUseReinforcementInfoLine>
						<m_dwPelletPulseLengthMs>45</m_dwPelletPulseLengthMs>
						<m_dwReinforcementInfoLinePulseMs>20</m_dwReinforcementInfoLinePulseMs>
						<m_fDarknessTimeSec>10</m_fDarknessTimeSec>
						<m_fExtraPunishmentDeviceDurationSec>10</m_fExtraPunishmentDeviceDurationSec>
						<m_fExtraRewardDeviceDurationSec>5</m_fExtraRewardDeviceDurationSec>
						<m_fInterPelletGapSec>0.5</m_fInterPelletGapSec>
						<m_fPump2ContPumpTimeSec>1</m_fPump2ContPumpTimeSec>
						<m_fPump2DurationSec>5</m_fPump2DurationSec>
						<m_fPumpContPumpTimeSec>1</m_fPumpContPumpTimeSec>
						<m_fPumpDurationSec>5</m_fPumpDurationSec>
						<m_fVisualStimulusDurationSec>2</m_fVisualStimulusDurationSec>
						<m_fVisualStimulusOffTimeSec>0.5</m_fVisualStimulusOffTimeSec>
						<m_fVisualStimulusOnTimeSec>0.5</m_fVisualStimulusOnTimeSec>
						<m_iPelletsPerReinf>1</m_iPelletsPerReinf>
						<m_iVisualStimulusXCoord>500</m_iVisualStimulusXCoord>
						<m_iVisualStimulusYCoord>375</m_iVisualStimulusYCoord>
						<m_strVisualStimulusName></m_strVisualStimulusName>
						<m_sound>
						<m_bPlaySound>1</m_bPlaySound>
						<m_bSoundIsWav>0</m_bSoundIsWav>
						<m_enumSoundType>1</m_enumSoundType>
						<m_fSoundDurationSec>2</m_fSoundDurationSec>
						<m_iSoundFrequencyHz>40</m_iSoundFrequencyHz>
						<m_iSoundLevelDb>85</m_iSoundLevelDb>
						<m_strSoundFile></m_strSoundFile>
						</m_sound>
						</DefaultPunishment>
							<SoundLink>
							<m_bPlaySound>1</m_bPlaySound>
							<m_bSoundIsWav>0</m_bSoundIsWav>
							<m_enumSoundType>0</m_enumSoundType>
							<m_fSoundDurationSec>1</m_fSoundDurationSec>
							<m_iSoundFrequencyHz>100</m_iSoundFrequencyHz>
							<m_iSoundLevelDb>100</m_iSoundLevelDb>
							<m_strSoundFile></m_strSoundFile>
							</SoundLink>
							<SoundMarker1>
							<m_bPlaySound>1</m_bPlaySound>
							<m_bSoundIsWav>0</m_bSoundIsWav>
							<m_enumSoundType>3</m_enumSoundType>
							<m_fSoundDurationSec>1</m_fSoundDurationSec>
							<m_iSoundFrequencyHz>500</m_iSoundFrequencyHz>
							<m_iSoundLevelDb>100</m_iSoundLevelDb>
							<m_strSoundFile></m_strSoundFile>
							</SoundMarker1>
							<SoundMarker2>
							<m_bPlaySound>1</m_bPlaySound>
							<m_bSoundIsWav>0</m_bSoundIsWav>
							<m_enumSoundType>3</m_enumSoundType>
							<m_fSoundDurationSec>1</m_fSoundDurationSec>
							<m_iSoundFrequencyHz>500</m_iSoundFrequencyHz>
							<m_iSoundLevelDb>100</m_iSoundLevelDb>
							<m_strSoundFile></m_strSoundFile>
							</SoundMarker2>
							<SoundMarker3>
							<m_bPlaySound>1</m_bPlaySound>
							<m_bSoundIsWav>0</m_bSoundIsWav>
							<m_enumSoundType>1</m_enumSoundType>
							<m_fSoundDurationSec>1</m_fSoundDurationSec>
							<m_iSoundFrequencyHz>300</m_iSoundFrequencyHz>
							<m_iSoundLevelDb>85</m_iSoundLevelDb>
							<m_strSoundFile></m_strSoundFile>
							</SoundMarker3>
	</GeneralParameters>
		<ModuleNames>
			<Task_0>NewTouchTraining</Task_0> <!-- nom de la tache -->
		</ModuleNames>
	<ModuleConfigurations>
		<Task_0> 
			<NewTouchTraining> <!-- Paramètres de la tache 0 -->
			<m_bInitialFreeReward>0</m_bInitialFreeReward>
			<m_bLeavingStimulusUpDuringReward>0</m_bLeavingStimulusUpDuringReward>
			<m_bMagazineLightForInitiation>0</m_bMagazineLightForInitiation>
			<m_bMissIsFailure>0</m_bMissIsFailure>
			<m_bMove>1</m_bMove>
			<m_bPunishITITouches>0</m_bPunishITITouches>
			<m_bPunishNotReward>0</m_bPunishNotReward>
			<m_bSpecifyStimuli>1</m_bSpecifyStimuli> 
			<m_fMaxIntertrialTimeSec>".$param1."</m_fMaxIntertrialTimeSec> <!-- Temps min entre les essais en secondes (intervalle avec max) - *** temps entre inter-cibles -->
			<m_fMaxTimeMinutes>".$param2."</m_fMaxTimeMinutes> <!-- Temps max pour cette tache en minutes -->
			<m_fMinIntertrialTimeSec>".$param3."</m_fMinIntertrialTimeSec> <!-- Temps max entre les essais en secondes - *** temps entre inter-cibles -->
			<m_fResponseCriterionTimeSec>".$param4."</m_fResponseCriterionTimeSec> <!-- Temps de réponse max en secondes(délai) -->
			<m_iBlue>0</m_iBlue>
			<m_iCorrectTrialsToShrinkAfter>5</m_iCorrectTrialsToShrinkAfter>
			<m_iFinalSize>0</m_iFinalSize>
			<m_iGreen>0</m_iGreen>
			<m_iInitiationMethod>0</m_iInitiationMethod>
			<m_iMaxTrials>".$param5."</m_iMaxTrials> <!-- Nombre d'essais -->
			<m_iNumStimuli>".$param6."</m_iNumStimuli> <!-- Numéro du stimuli - figure affichée -->
			<m_iRed>255</m_iRed>
			<m_iStartingSize>6</m_iStartingSize>
			<m_strStimulus>".$param7."</m_strStimulus> <!-- figure affichée - *** stimuli  -->
			<m_locations> <!-- locations des figures affichées sur l'écran -->
			<Location_0_X>123</Location_0_X>
			<Location_0_Y>160</Location_0_Y>
			<Location_10_X>673</Location_10_X>
			<Location_10_Y>498</Location_10_Y>
			<Location_11_X>873</Location_11_X>
			<Location_11_Y>459</Location_11_Y>
			<Location_12_X>123</Location_12_X>
			<Location_12_Y>654</Location_12_Y>
			<Location_13_X>323</Location_13_X>
			<Location_13_Y>629</Location_13_Y>
			<Location_14_X>641</Location_14_X>
			<Location_14_Y>654</Location_14_Y>
			<Location_15_X>785</Location_15_X>
			<Location_15_Y>654</Location_15_Y>
			<Location_1_X>310</Location_1_X>
			<Location_1_Y>160</Location_1_Y>
			<Location_2_X>616</Location_2_X>
			<Location_2_Y>97</Location_2_Y>
			<Location_3_X>848</Location_3_X>
			<Location_3_Y>104</Location_3_Y>
			<Location_4_X>166</Location_4_X>
			<Location_4_Y>323</Location_4_Y>
			<Location_5_X>385</Location_5_X>
			<Location_5_Y>341</Location_5_Y>
			<Location_6_X>685</Location_6_X>
			<Location_6_Y>329</Location_6_Y>
			<Location_7_X>885</Location_7_X>
			<Location_7_Y>248</Location_7_Y>
			<Location_8_X>179</Location_8_X>
			<Location_8_Y>479</Location_8_Y>
			<Location_9_X>391</Location_9_X>
			<Location_9_Y>484</Location_9_Y>
			<NumLocations>16</NumLocations>
			<m_bMaxSizeSpecified>0</m_bMaxSizeSpecified>
			<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
			<m_iMaxSize>0</m_iMaxSize>
			<m_iMinSize>1</m_iMinSize>
			</m_locations>
			</NewTouchTraining>
		</Task_0>
	</ModuleConfigurations>
</MonkeyCantab>";
				fputs($file,$str);
				fclose($file);
				
				//echo "type:".$_SESSION['type_tache'];
				
				// recherche de l'id du type de tache
				$query = "select Task_Type from CPS_Taches_Valides where code_FR='".$_SESSION['type_tache']."'";
				//echo $_SESSION['type_tache'];
				//$query = "insert into CPS_Taches (nom_tache, Task_Type, lien_xml_tache, date_creation_tache) select '".$_SESSION['name']."', Task_Type, 'resultats/".$_SESSION['name'].".xml', Date() from CPS_Taches_Valides where code_FR='".$_SESSION['type']."'"; 
				$rs = $conn->execute($query); 

				while (!$rs->EOF)
				{ 
					$id = $rs->Fields(0)->value;
					$rs->MoveNext();
				} 
				//echo $result1;
				// date
				//$date = date('d/m/Y');				
				//echo $date;
				
				if($exist == "non present")
				{
					// insertion de la tache dans la base avec le lien vers le fichier 
					$query2 = "insert into CPS_Taches (nom_tache, Task_Type, lien_xml_tache) values ('".$_SESSION['name']."', ".$id.", 'resultats/".$_SESSION['name'].".xml')";
					//echo $query2;
					echo "<span style='font-size:18px; color:black;'>Creation effectuee !</span>";
				}
				else
				{
					// update de la tache dans la base avec le lien vers le fichier 
					$query2 = "UPDATE CPS_Taches SET nom_tache = '".$_SESSION['name']."', Task_Type = ".$id.", lien_xml_tache = 'resultats/".$_SESSION['name'].".xml' WHERE (nom_tache = '".$_SESSION['name']."')";
					//echo $query2;
					echo "<span style='font-size:18px; color:black;'>Modification effectuee !</span>";
				}
				
				$rs = $conn->execute($query2);
				
				$conn->Close();
				
			}
	
?>

	<a class="back" href="main_page.php" style="margin-top:10px;" >Retour</a>

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