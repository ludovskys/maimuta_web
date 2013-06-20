<?php

// Creation du fichier
if (!$file = fopen("resultats/".$namefile.".xml","w+")) 
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
<Comment>(add your comment here)</Comment>
<Database></Database>
<DisableHouselightDuringTasks>0</DisableHouselightDuringTasks>
<LinkDuration>20</LinkDuration>
<LinkUseHouselight>0</LinkUseHouselight>
<MaxTimeToWaitForFingerRemovalSec>0</MaxTimeToWaitForFingerRemovalSec>
<MediaDirectory></MediaDirectory>
<NumModules>1</NumModules>
<NumObjects>1</NumObjects>
<OverallMaxRewards>0</OverallMaxRewards>
<RespondToMouse>0</RespondToMouse>
<Session>3</Session>
<StartWithLink>0</StartWithLink>
<StrictTouches>0</StrictTouches>
<Subject>xxx</Subject>
<SummaryFile>xxx-23May2013-1650-MonkeyCantab-summary.txt</SummaryFile>
<DefaultReward>
<m_bDarkness>0</m_bDarkness>
<m_bDatabaseConsidersThisReward>1</m_bDatabaseConsidersThisReward>
<m_bExtraPunishmentDevice>0</m_bExtraPunishmentDevice>
<m_bExtraRewardDevice>0</m_bExtraRewardDevice>
<m_bGivePellet>1</m_bGivePellet>
<m_bGivePump>0</m_bGivePump>
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
<m_strVisualStimulusName>whiteScreen</m_strVisualStimulusName>
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
<m_bGiveVisualStimulus>1</m_bGiveVisualStimulus>
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
<ObjectNames>
<Object_0>whiteScreen</Object_0>
</ObjectNames>
<ObjectConfigurations>
<Object_0>
<whiteScreen>
<NumComponents>1</NumComponents>
<ObjectName>whiteScreen</ObjectName>
<ComponentTypes>
<Component_0>Bitmap</Component_0>
</ComponentTypes>
<Component_0>
<m_bStretch>0</m_bStretch>
<m_iHeight>-1</m_iHeight>
<m_iLeft>0</m_iLeft>
<m_iTop>0</m_iTop>
<m_iWidth>-1</m_iWidth>
<m_strFilename>C:\white.bmp</m_strFilename>
<m_strName>BMP_White</m_strName>
</Component_0>
</whiteScreen>
</Object_0>
</ObjectConfigurations>
<ModuleNames>
<Task_0>NewTouchTraining</Task_0>
</ModuleNames>
<ModuleConfigurations>
<Task_0>
<NewTouchTraining>
<m_bInitialFreeReward>0</m_bInitialFreeReward>
<m_bLeavingStimulusUpDuringReward>0</m_bLeavingStimulusUpDuringReward>
<m_bMagazineLightForInitiation>0</m_bMagazineLightForInitiation>
<m_bMissIsFailure>1</m_bMissIsFailure>
<m_bMove>1</m_bMove>
<m_bPunishITITouches>0</m_bPunishITITouches>
<m_bPunishNotReward>0</m_bPunishNotReward>
<m_bSpecifyStimuli>0</m_bSpecifyStimuli>
<m_fMaxIntertrialTimeSec>".$elem[3]."</m_fMaxIntertrialTimeSec>
<m_fMaxTimeMinutes>100</m_fMaxTimeMinutes>
<m_fMinIntertrialTimeSec>".$elem[2]."</m_fMinIntertrialTimeSec>
<m_fResponseCriterionTimeSec>".$elem[4]."</m_fResponseCriterionTimeSec>
<m_iBlue>255</m_iBlue>
<m_iCorrectTrialsToShrinkAfter>1</m_iCorrectTrialsToShrinkAfter>
<m_iFinalSize>".$elem[8]."</m_iFinalSize>
<m_iGreen>0</m_iGreen>
<m_iInitiationMethod>".$elem[1]."</m_iInitiationMethod>
<m_iMaxTrials>".$elem[5]."</m_iMaxTrials>
<m_iNumStimuli>1</m_iNumStimuli>
<m_iRed>255</m_iRed>
<m_iStartingSize>".$elem[7]."</m_iStartingSize>
<m_strStimulus>".$elem[6]."</m_strStimulus>
<m_locations>
<Location_0_X>500</Location_0_X>
<Location_0_Y>375</Location_0_Y>
<NumLocations>1</NumLocations>
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

}

?>