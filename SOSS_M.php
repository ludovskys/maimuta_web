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
<LinkDuration>2</LinkDuration>
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
<SummaryFile>xxx-20May2013-0027-MonkeyCantab-summary.txt</SummaryFile>
<DefaultReward>
<m_bDarkness>0</m_bDarkness>
<m_bDatabaseConsidersThisReward>1</m_bDatabaseConsidersThisReward>
<m_bExtraPunishmentDevice>0</m_bExtraPunishmentDevice>
<m_bExtraRewardDevice>0</m_bExtraRewardDevice>
<m_bGivePellet>1</m_bGivePellet>
<m_bGivePump>0</m_bGivePump>
<m_bGivePump2>0</m_bGivePump2>
<m_bGiveVisualStimulus>1</m_bGiveVisualStimulus>
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
<Task_0>SpatialWM</Task_0>
</ModuleNames>
<ModuleConfigurations>
<Task_0>
<SpatialWM>
<NumSchemes>0</NumSchemes>
<m_bCorrectionProcedure>0</m_bCorrectionProcedure>
<m_bIncreaseNumStimuli>0</m_bIncreaseNumStimuli>
<m_bIncreaseNumStimuliEveryXTrials>0</m_bIncreaseNumStimuliEveryXTrials>
<m_bMarkResponsesAural>".$elem[9]."</m_bMarkResponsesAural>
<m_bMarkResponsesVisual>1</m_bMarkResponsesVisual>
<m_bProbe>0</m_bProbe>
<m_bRequireLeverToStartTrials>".$elem[1]."</m_bRequireLeverToStartTrials>
<m_bRewardEveryCorrectTouch>".$elem[10]."</m_bRewardEveryCorrectTouch>
<m_bUsePrespecifiedSequence>0</m_bUsePrespecifiedSequence>
<m_fBlankScreenTimeSec>".$elem[5]."</m_fBlankScreenTimeSec>
<m_fMaxIntertrialTimeSec>1</m_fMaxIntertrialTimeSec>
<m_fMaxResponseTimeSec>".$elem[3]."</m_fMaxResponseTimeSec>
<m_fMaxTimeMinutes>60</m_fMaxTimeMinutes>
<m_fMinIntertrialTimeSec>1</m_fMinIntertrialTimeSec>
<m_fVanishTimeSec>10</m_fVanishTimeSec>
<m_fVisualMarkerTimeSec>".$elem[7]."</m_fVisualMarkerTimeSec>
<m_iBlankingTimeDWORMultiplier>1</m_iBlankingTimeDWORMultiplier>
<m_iChoiceConsequence>0</m_iChoiceConsequence>
<m_iCorrectionLimit>1</m_iCorrectionLimit>
<m_iGridType>0</m_iGridType>
<m_iIncreaseCriterion>10</m_iIncreaseCriterion>
<m_iMaxErrors>1</m_iMaxErrors>
<m_iMaxTrials>1</m_iMaxTrials>
<m_iScreenBlankMethod>1</m_iScreenBlankMethod>
<m_iStartingNumStimuli>".$elem[4]."</m_iStartingNumStimuli>
<m_strMainObject>univcam_".$elem[2]."</m_strMainObject>
<m_strPrespecifiedSequence></m_strPrespecifiedSequence>
<m_strPreviouslyChosenObject></m_strPreviouslyChosenObject>
<m_strVisualMarkerObject>univcam_".$elem[8]."</m_strVisualMarkerObject>
<m_vfBlankingTimes></m_vfBlankingTimes>
<m_vlocationsets>
<m_vlocationsets_NumElements>4</m_vlocationsets_NumElements>
<m_vlocationsets_Element_0>
<Location_0_X>143</Location_0_X>
<Location_0_Y>107</Location_0_Y>
<Location_10_X>618</Location_10_X>
<Location_10_Y>464</Location_10_Y>
<Location_11_X>856</Location_11_X>
<Location_11_Y>464</Location_11_Y>
<Location_12_X>143</Location_12_X>
<Location_12_Y>642</Location_12_Y>
<Location_13_X>381</Location_13_X>
<Location_13_Y>642</Location_13_Y>
<Location_14_X>618</Location_14_X>
<Location_14_Y>642</Location_14_Y>
<Location_15_X>856</Location_15_X>
<Location_15_Y>642</Location_15_Y>
<Location_1_X>381</Location_1_X>
<Location_1_Y>107</Location_1_Y>
<Location_2_X>618</Location_2_X>
<Location_2_Y>107</Location_2_Y>
<Location_3_X>856</Location_3_X>
<Location_3_Y>107</Location_3_Y>
<Location_4_X>143</Location_4_X>
<Location_4_Y>285</Location_4_Y>
<Location_5_X>381</Location_5_X>
<Location_5_Y>285</Location_5_Y>
<Location_6_X>618</Location_6_X>
<Location_6_Y>285</Location_6_Y>
<Location_7_X>856</Location_7_X>
<Location_7_Y>285</Location_7_Y>
<Location_8_X>143</Location_8_X>
<Location_8_Y>464</Location_8_Y>
<Location_9_X>381</Location_9_X>
<Location_9_Y>464</Location_9_Y>
<NumLocations>16</NumLocations>
<m_bMaxSizeSpecified>1</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>16</m_iMaxSize>
<m_iMinSize>16</m_iMinSize>
</m_vlocationsets_Element_0>
<m_vlocationsets_Element_1>
<Location_0_X>129</Location_0_X>
<Location_0_Y>166</Location_0_Y>
<Location_10_X>623</Location_10_X>
<Location_10_Y>510</Location_10_Y>
<Location_11_X>829</Location_11_X>
<Location_11_Y>473</Location_11_Y>
<Location_12_X>129</Location_12_X>
<Location_12_Y>648</Location_12_Y>
<Location_13_X>329</Location_13_X>
<Location_13_Y>635</Location_13_Y>
<Location_14_X>591</Location_14_X>
<Location_14_Y>660</Location_14_Y>
<Location_15_X>741</Location_15_X>
<Location_15_Y>660</Location_15_Y>
<Location_1_X>316</Location_1_X>
<Location_1_Y>166</Location_1_Y>
<Location_2_X>566</Location_2_X>
<Location_2_Y>97</Location_2_Y>
<Location_3_X>860</Location_3_X>
<Location_3_Y>104</Location_3_Y>
<Location_4_X>241</Location_4_X>
<Location_4_Y>323</Location_4_Y>
<Location_5_X>466</Location_5_X>
<Location_5_Y>341</Location_5_Y>
<Location_6_X>685</Location_6_X>
<Location_6_Y>327</Location_6_Y>
<Location_7_X>891</Location_7_X>
<Location_7_Y>254</Location_7_Y>
<Location_8_X>179</Location_8_X>
<Location_8_Y>479</Location_8_Y>
<Location_9_X>391</Location_9_X>
<Location_9_Y>484</Location_9_Y>
<NumLocations>16</NumLocations>
<m_bMaxSizeSpecified>1</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>16</m_iMaxSize>
<m_iMinSize>16</m_iMinSize>
</m_vlocationsets_Element_1>
<m_vlocationsets_Element_2>
<Location_0_X>238</Location_0_X>
<Location_0_Y>107</Location_0_Y>
<Location_1_X>761</Location_1_X>
<Location_1_Y>107</Location_1_Y>
<Location_2_X>143</Location_2_X>
<Location_2_Y>320</Location_2_Y>
<Location_3_X>499</Location_3_X>
<Location_3_Y>320</Location_3_Y>
<Location_4_X>856</Location_4_X>
<Location_4_Y>320</Location_4_Y>
<Location_5_X>238</Location_5_X>
<Location_5_Y>530</Location_5_Y>
<Location_6_X>761</Location_6_X>
<Location_6_Y>530</Location_6_Y>
<Location_7_X>499</Location_7_X>
<Location_7_Y>642</Location_7_Y>
<NumLocations>8</NumLocations>
<m_bMaxSizeSpecified>1</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>8</m_iMaxSize>
<m_iMinSize>8</m_iMinSize>
</m_vlocationsets_Element_2>
<m_vlocationsets_Element_3>
<Location_0_X>250</Location_0_X>
<Location_0_Y>375</Location_0_Y>
<Location_1_X>750</Location_1_X>
<Location_1_Y>375</Location_1_Y>
<NumLocations>2</NumLocations>
<m_bMaxSizeSpecified>1</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>16</m_iMaxSize>
<m_iMinSize>1</m_iMinSize>
</m_vlocationsets_Element_3>
</m_vlocationsets>
</SpatialWM>
</Task_0>
</ModuleConfigurations>
</MonkeyCantab>";


	fputs($file,$str);
	fclose($file);

}

?>