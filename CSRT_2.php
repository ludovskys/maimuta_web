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
<Session>2</Session>
<StartWithLink>0</StartWithLink>
<StrictTouches>0</StrictTouches>
<Subject>xxx</Subject>
<SummaryFile>xxx-18May2013-1519-MonkeyCantab-summary.txt</SummaryFile>
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
<m_strVisualStimulusName>whiteScreen</m_strVisualStimulusName>
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
<Task_0>MultipleChoice</Task_0>
</ModuleNames>
<ModuleConfigurations>
<Task_0>
<MultipleChoice>
<Delay_0>0.5</Delay_0>
<Delay_1>1</Delay_1>
<Delay_2>1.5</Delay_2>
<Delay_3>2</Delay_3>
<NumDelays>4</NumDelays>
<NumStimulusDurations>1</NumStimulusDurations>
<StimulusDuration_0>0.5</StimulusDuration_0>
<m_bDistractorOnlyForSomeTrials>0</m_bDistractorOnlyForSomeTrials>
<m_bDrawWithoutReplacement>0</m_bDrawWithoutReplacement>
<m_bIgnoreResponsesDuringPhase1>0</m_bIgnoreResponsesDuringPhase1>
<m_bLeverRetractable>1</m_bLeverRetractable>
<m_bMagazineLightForInitiation>0</m_bMagazineLightForInitiation>
<m_bPermitPerseverative>".$elem[7]."</m_bPermitPerseverative>
<m_bPhase1Marker2Sound>1</m_bPhase1Marker2Sound>
<m_bPhase1RespondUntilTarget>0</m_bPhase1RespondUntilTarget>
<m_bPhase2EquiprobableLocations>1</m_bPhase2EquiprobableLocations>
<m_bPhase2MaxRespTimedFromEnd>0</m_bPhase2MaxRespTimedFromEnd>
<m_bPunishPerseverative>0</m_bPunishPerseverative>
<m_bPunishPremOnlyByResettingDelay>0</m_bPunishPremOnlyByResettingDelay>
<m_bPunishPremature>1</m_bPunishPremature>
<m_bRequirePhase1>0</m_bRequirePhase1>
<m_bRewardPhase1>0</m_bRewardPhase1>
<m_bUseDistractor>0</m_bUseDistractor>
<m_fDelayMaxSec>".$elem[5]."</m_fDelayMaxSec>
<m_fDelayMinSec>".$elem[4]."</m_fDelayMinSec>
<m_fDistractorOffsetSec>1.2</m_fDistractorOffsetSec>
<m_fDistractorOnsetSec>1</m_fDistractorOnsetSec>
<m_fMaxIntertrialTimeSec>1</m_fMaxIntertrialTimeSec>
<m_fMaxTimeMinutes>60</m_fMaxTimeMinutes>
<m_fMinIntertrialTimeSec>1</m_fMinIntertrialTimeSec>
<m_fP1HCeiling>10</m_fP1HCeiling>
<m_fP1HIncrement>1</m_fP1HIncrement>
<m_fP1HStart>0</m_fP1HStart>
<m_fPDistractor>0.5</m_fPDistractor>
<m_fPerseverativeTimeSec>".$elem[8]."</m_fPerseverativeTimeSec>
<m_fPhase1HoldTimeSec>10</m_fPhase1HoldTimeSec>
<m_fPhase1MaxResponseTimeSec>".$elem[3]."</m_fPhase1MaxResponseTimeSec>
<m_fPhase2MaxResponseTimeSec>".$elem[3]."</m_fPhase2MaxResponseTimeSec>
<m_fPhase2PAlternativeStimulus>0.5</m_fPhase2PAlternativeStimulus>
<m_fPhase2ProbabilityLeft>0.333333</m_fPhase2ProbabilityLeft>
<m_fPhase2ProbabilityLoc0>0.2</m_fPhase2ProbabilityLoc0>
<m_fPhase2ProbabilityLoc1>0.2</m_fPhase2ProbabilityLoc1>
<m_fPhase2ProbabilityLoc2>0.2</m_fPhase2ProbabilityLoc2>
<m_fPhase2ProbabilityLoc3>0.2</m_fPhase2ProbabilityLoc3>
<m_fPhase2ProbabilityRight>0.333333</m_fPhase2ProbabilityRight>
<m_fStimulusDurationDecreaseBySec>0.1</m_fStimulusDurationDecreaseBySec>
<m_fStimulusDurationDecreaseToSec>0.1</m_fStimulusDurationDecreaseToSec>
<m_fStimulusDurationMaxSec>2</m_fStimulusDurationMaxSec>
<m_fStimulusDurationMinSec>0.5</m_fStimulusDurationMinSec>
<m_fStimulusDurationStartWithSec>".$elem[6]."</m_fStimulusDurationStartWithSec>
<m_iCentringResponseDevice>0</m_iCentringResponseDevice>
<m_iDelayDWORMultiplier>1</m_iDelayDWORMultiplier>
<m_iDelayMethod>0</m_iDelayMethod>
<m_iDelayTrialsPerValue>1</m_iDelayTrialsPerValue>
<m_iDistractorFirstTrial>0</m_iDistractorFirstTrial>
<m_iDistractorLastTrial>100</m_iDistractorLastTrial>
<m_iLocationVectorMultiplier>1</m_iLocationVectorMultiplier>
<m_iMaxTrials>1</m_iMaxTrials>
<m_iP1HCriterion>5</m_iP1HCriterion>
<m_iPerseverativeMethod>1</m_iPerseverativeMethod>
<m_iPhase1HoldTimeMethod>0</m_iPhase1HoldTimeMethod>
<m_iStimDurDWORMultiplier>1</m_iStimDurDWORMultiplier>
<m_iStimulusDurationDecreaseEvery>5</m_iStimulusDurationDecreaseEvery>
<m_iStimulusDurationMethod>0</m_iStimulusDurationMethod>
<m_iStimulusDurationTrialsPerValue>1</m_iStimulusDurationTrialsPerValue>
<m_iTaskType>3</m_iTaskType>
<m_strDistractorStimulus></m_strDistractorStimulus>
<m_strPhase1Stimulus>univcam_IDED_shape_1</m_strPhase1Stimulus>
<m_strPhase1StimulusBeingTouched>univcam_IDED_shape_2</m_strPhase1StimulusBeingTouched>
<m_strPhase2AbsentStimulus>univcam_IDED_shape_3</m_strPhase2AbsentStimulus>
<m_strPhase2AlternativeStimulus></m_strPhase2AlternativeStimulus>
<m_strPhase2NonTargetStimulus></m_strPhase2NonTargetStimulus>
<m_strPhase2Stimulus>univcam_IDED_shape_21</m_strPhase2Stimulus>
<m_locset_phase1>
<Location_0_X>500</Location_0_X>
<Location_0_Y>375</Location_0_Y>
<NumLocations>1</NumLocations>
<m_bMaxSizeSpecified>1</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>1</m_iMaxSize>
<m_iMinSize>1</m_iMinSize>
</m_locset_phase1>
<m_locset_phase2>
<Location_0_X>250</Location_0_X>
<Location_0_Y>375</Location_0_Y>
<Location_1_X>750</Location_1_X>
<Location_1_Y>375</Location_1_Y>
<NumLocations>2</NumLocations>
<m_bMaxSizeSpecified>1</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>5</m_iMaxSize>
<m_iMinSize>1</m_iMinSize>
</m_locset_phase2>
</MultipleChoice>
</Task_0>
</ModuleConfigurations>
</MonkeyCantab>";


	fputs($file,$str);
	fclose($file);

}

?>