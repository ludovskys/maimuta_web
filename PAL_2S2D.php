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
<Session>11</Session>
<StartWithLink>0</StartWithLink>
<StrictTouches>0</StrictTouches>
<Subject>xxx</Subject>
<SummaryFile>xxx-20May2013-0022-MonkeyCantab-summary.txt</SummaryFile>
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
<Task_0>PAL</Task_0>
</ModuleNames>
<ModuleConfigurations>
<Task_0>
<PAL>
<NumSchemes>9</NumSchemes>
<NumStimuli>0</NumStimuli>
<m_bEndTrialOnFirstError>1</m_bEndTrialOnFirstError>
<m_bMarkResponses>0</m_bMarkResponses>
<m_bMustTouchSampleStimulus>".$elem[5]."</m_bMustTouchSampleStimulus>
<m_bRepeatFailedTrials>0</m_bRepeatFailedTrials>
<m_bRequireLeverToStartTrials>".$elem[1]."</m_bRequireLeverToStartTrials>
<m_bRewardEachCorrectChoice>".$elem[11]."</m_bRewardEachCorrectChoice>
<m_bRewardedForTouchingSample>".$elem[7]."</m_bRewardedForTouchingSample>
<m_bShuffleOnRepeat>0</m_bShuffleOnRepeat>
<m_bShuffleOrderWithinTrial>1</m_bShuffleOrderWithinTrial>
<m_bSpecifyStimuliByHand>0</m_bSpecifyStimuliByHand>
<m_bTouchResetsDelay>0</m_bTouchResetsDelay>
<m_bTouchResetsITI>0</m_bTouchResetsITI>
<m_bTrainingIgnoreIncorrectChoices>0</m_bTrainingIgnoreIncorrectChoices>
<m_bTrainingOnlyOneRealChoice>0</m_bTrainingOnlyOneRealChoice>
<m_bVaryColours>1</m_bVaryColours>
<m_fMaxIntertrialTimeSec>1</m_fMaxIntertrialTimeSec>
<m_fMaxMemoryDelaySec>".$elem[8]."</m_fMaxMemoryDelaySec>
<m_fMaxResponseTimeSec>".$elem[3]."</m_fMaxResponseTimeSec>
<m_fMaxTimeMinutes>60</m_fMaxTimeMinutes>
<m_fMinIntertrialTimeSec>1</m_fMinIntertrialTimeSec>
<m_fMinMemoryDelaySec>".$elem[8]."</m_fMinMemoryDelaySec>
<m_fSampleStimDurIfNoTouchReqdSec>".$elem[6]."</m_fSampleStimDurIfNoTouchReqdSec>
<m_fTimeBetweenChoicesSec>".$elem[10]."</m_fTimeBetweenChoicesSec>
<m_fTimeBetweenSamplesSec>".$elem[10]."</m_fTimeBetweenSamplesSec>
<m_iBaseStimulusOrder>0</m_iBaseStimulusOrder>
<m_iMaxTrials>0</m_iMaxTrials>
<m_iRepeatFailedTrialsUpTo>5</m_iRepeatFailedTrialsUpTo>
<m_iStartWithStimulus>0</m_iStartWithStimulus>
<m_iStimulusSelectionTechnique>0</m_iStimulusSelectionTechnique>
<m_iStimulusSet>".$elem[2]."</m_iStimulusSet>
<m_iTrialsToAvoidRepeatsOver>5</m_iTrialsToAvoidRepeatsOver>
<m_strEmptyBoxObject>univcam_IDED_shape_1</m_strEmptyBoxObject>
<m_strTrialScheme>".$elem[4]."S.".$elem[9].".D</m_strTrialScheme>
<m_viUserStimulusOrder></m_viUserStimulusOrder>
<m_vlocationsets>
<m_vlocationsets_NumElements>7</m_vlocationsets_NumElements>
<m_vlocationsets_Element_0>
<Location_0_X>183</Location_0_X>
<Location_0_Y>137</Location_0_Y>
<Location_1_X>816</Location_1_X>
<Location_1_Y>137</Location_1_Y>
<Location_2_X>183</Location_2_X>
<Location_2_Y>612</Location_2_Y>
<Location_3_X>816</Location_3_X>
<Location_3_Y>612</Location_3_Y>
<NumLocations>4</NumLocations>
<m_bMaxSizeSpecified>1</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>4</m_iMaxSize>
<m_iMinSize>4</m_iMinSize>
</m_vlocationsets_Element_0>
<m_vlocationsets_Element_1>
<Location_0_X>500</Location_0_X>
<Location_0_Y>137</Location_0_Y>
<Location_1_X>183</Location_1_X>
<Location_1_Y>375</Location_1_Y>
<Location_2_X>816</Location_2_X>
<Location_2_Y>375</Location_2_Y>
<Location_3_X>500</Location_3_X>
<Location_3_Y>612</Location_3_Y>
<NumLocations>4</NumLocations>
<m_bMaxSizeSpecified>1</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>4</m_iMaxSize>
<m_iMinSize>4</m_iMinSize>
</m_vlocationsets_Element_1>
<m_vlocationsets_Element_2>
<Location_0_X>183</Location_0_X>
<Location_0_Y>137</Location_0_Y>
<Location_1_X>500</Location_1_X>
<Location_1_Y>137</Location_1_Y>
<Location_2_X>816</Location_2_X>
<Location_2_Y>137</Location_2_Y>
<Location_3_X>183</Location_3_X>
<Location_3_Y>375</Location_3_Y>
<Location_4_X>500</Location_4_X>
<Location_4_Y>375</Location_4_Y>
<Location_5_X>816</Location_5_X>
<Location_5_Y>375</Location_5_Y>
<Location_6_X>183</Location_6_X>
<Location_6_Y>612</Location_6_Y>
<Location_7_X>500</Location_7_X>
<Location_7_Y>612</Location_7_Y>
<Location_8_X>816</Location_8_X>
<Location_8_Y>612</Location_8_Y>
<NumLocations>9</NumLocations>
<m_bMaxSizeSpecified>1</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>9</m_iMaxSize>
<m_iMinSize>9</m_iMinSize>
</m_vlocationsets_Element_2>
<m_vlocationsets_Element_3>
<Location_0_X>133</Location_0_X>
<Location_0_Y>100</Location_0_Y>
<Location_1_X>866</Location_1_X>
<Location_1_Y>100</Location_1_Y>
<Location_2_X>133</Location_2_X>
<Location_2_Y>650</Location_2_Y>
<Location_3_X>866</Location_3_X>
<Location_3_Y>650</Location_3_Y>
<NumLocations>4</NumLocations>
<m_bMaxSizeSpecified>1</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>4</m_iMaxSize>
<m_iMinSize>4</m_iMinSize>
</m_vlocationsets_Element_3>
<m_vlocationsets_Element_4>
<Location_0_X>500</Location_0_X>
<Location_0_Y>100</Location_0_Y>
<Location_1_X>133</Location_1_X>
<Location_1_Y>375</Location_1_Y>
<Location_2_X>866</Location_2_X>
<Location_2_Y>375</Location_2_Y>
<Location_3_X>500</Location_3_X>
<Location_3_Y>650</Location_3_Y>
<NumLocations>4</NumLocations>
<m_bMaxSizeSpecified>1</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>4</m_iMaxSize>
<m_iMinSize>4</m_iMinSize>
</m_vlocationsets_Element_4>
<m_vlocationsets_Element_5>
<Location_0_X>143</Location_0_X>
<Location_0_Y>600</Location_0_Y>
<Location_1_X>381</Location_1_X>
<Location_1_Y>600</Location_1_Y>
<Location_2_X>618</Location_2_X>
<Location_2_Y>600</Location_2_Y>
<Location_3_X>856</Location_3_X>
<Location_3_Y>600</Location_3_Y>
<NumLocations>4</NumLocations>
<m_bMaxSizeSpecified>1</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>4</m_iMaxSize>
<m_iMinSize>4</m_iMinSize>
</m_vlocationsets_Element_5>
<m_vlocationsets_Element_6>
<Location_0_X>250</Location_0_X>
<Location_0_Y>375</Location_0_Y>
<Location_1_X>750</Location_1_X>
<Location_1_Y>375</Location_1_Y>
<NumLocations>2</NumLocations>
<m_bMaxSizeSpecified>0</m_bMaxSizeSpecified>
<m_bMinSizeSpecified>1</m_bMinSizeSpecified>
<m_iMaxSize>0</m_iMaxSize>
<m_iMinSize>1</m_iMinSize>
</m_vlocationsets_Element_6>
</m_vlocationsets>
<Scheme_0>
<NumBlocks>1</NumBlocks>
<m_strName>2S3D</m_strName>
<Block_0>
<m_bEmptyBoxLastInSample>0</m_bEmptyBoxLastInSample>
<m_bZurichOption>0</m_bZurichOption>
<m_iGridType>1</m_iGridType>
<m_iNumEmpty>0</m_iNumEmpty>
<m_iNumExtra>2</m_iNumExtra>
<m_iNumStimuli>2</m_iNumStimuli>
<m_iNumTrials>1</m_iNumTrials>
<m_iNumZurichDistractors>0</m_iNumZurichDistractors>
</Block_0>
</Scheme_0>
<Scheme_1>
<NumBlocks>1</NumBlocks>
<m_strName>2S2D</m_strName>
<Block_0>
<m_bEmptyBoxLastInSample>0</m_bEmptyBoxLastInSample>
<m_bZurichOption>0</m_bZurichOption>
<m_iGridType>1</m_iGridType>
<m_iNumEmpty>0</m_iNumEmpty>
<m_iNumExtra>1</m_iNumExtra>
<m_iNumStimuli>2</m_iNumStimuli>
<m_iNumTrials>1</m_iNumTrials>
<m_iNumZurichDistractors>1</m_iNumZurichDistractors>
</Block_0>
</Scheme_1>
<Scheme_2>
<NumBlocks>1</NumBlocks>
<m_strName>2S1D</m_strName>
<Block_0>
<m_bEmptyBoxLastInSample>0</m_bEmptyBoxLastInSample>
<m_bZurichOption>0</m_bZurichOption>
<m_iGridType>1</m_iGridType>
<m_iNumEmpty>0</m_iNumEmpty>
<m_iNumExtra>0</m_iNumExtra>
<m_iNumStimuli>2</m_iNumStimuli>
<m_iNumTrials>1</m_iNumTrials>
<m_iNumZurichDistractors>1</m_iNumZurichDistractors>
</Block_0>
</Scheme_2>
<Scheme_3>
<NumBlocks>1</NumBlocks>
<m_strName>3S2D</m_strName>
<Block_0>
<m_bEmptyBoxLastInSample>0</m_bEmptyBoxLastInSample>
<m_bZurichOption>0</m_bZurichOption>
<m_iGridType>1</m_iGridType>
<m_iNumEmpty>0</m_iNumEmpty>
<m_iNumExtra>0</m_iNumExtra>
<m_iNumStimuli>3</m_iNumStimuli>
<m_iNumTrials>1</m_iNumTrials>
<m_iNumZurichDistractors>1</m_iNumZurichDistractors>
</Block_0>
</Scheme_3>
<Scheme_4>
<NumBlocks>1</NumBlocks>
<m_strName>3S3D</m_strName>
<Block_0>
<m_bEmptyBoxLastInSample>0</m_bEmptyBoxLastInSample>
<m_bZurichOption>0</m_bZurichOption>
<m_iGridType>1</m_iGridType>
<m_iNumEmpty>0</m_iNumEmpty>
<m_iNumExtra>1</m_iNumExtra>
<m_iNumStimuli>3</m_iNumStimuli>
<m_iNumTrials>1</m_iNumTrials>
<m_iNumZurichDistractors>1</m_iNumZurichDistractors>
</Block_0>
</Scheme_4>
<Scheme_5>
<NumBlocks>1</NumBlocks>
<m_strName>4S3D</m_strName>
<Block_0>
<m_bEmptyBoxLastInSample>0</m_bEmptyBoxLastInSample>
<m_bZurichOption>0</m_bZurichOption>
<m_iGridType>1</m_iGridType>
<m_iNumEmpty>0</m_iNumEmpty>
<m_iNumExtra>0</m_iNumExtra>
<m_iNumStimuli>4</m_iNumStimuli>
<m_iNumTrials>1</m_iNumTrials>
<m_iNumZurichDistractors>1</m_iNumZurichDistractors>
</Block_0>
</Scheme_5>
<Scheme_6>
<NumBlocks>1</NumBlocks>
<m_strName>1S1D</m_strName>
<Block_0>
<m_bEmptyBoxLastInSample>0</m_bEmptyBoxLastInSample>
<m_bZurichOption>0</m_bZurichOption>
<m_iGridType>0</m_iGridType>
<m_iNumEmpty>0</m_iNumEmpty>
<m_iNumExtra>1</m_iNumExtra>
<m_iNumStimuli>1</m_iNumStimuli>
<m_iNumTrials>1</m_iNumTrials>
<m_iNumZurichDistractors>1</m_iNumZurichDistractors>
</Block_0>
</Scheme_6>
<Scheme_7>
<NumBlocks>1</NumBlocks>
<m_strName>1S2D</m_strName>
<Block_0>
<m_bEmptyBoxLastInSample>0</m_bEmptyBoxLastInSample>
<m_bZurichOption>0</m_bZurichOption>
<m_iGridType>1</m_iGridType>
<m_iNumEmpty>0</m_iNumEmpty>
<m_iNumExtra>2</m_iNumExtra>
<m_iNumStimuli>1</m_iNumStimuli>
<m_iNumTrials>1</m_iNumTrials>
<m_iNumZurichDistractors>1</m_iNumZurichDistractors>
</Block_0>
</Scheme_7>
<Scheme_8>
<NumBlocks>1</NumBlocks>
<m_strName>1S3D</m_strName>
<Block_0>
<m_bEmptyBoxLastInSample>0</m_bEmptyBoxLastInSample>
<m_bZurichOption>0</m_bZurichOption>
<m_iGridType>1</m_iGridType>
<m_iNumEmpty>0</m_iNumEmpty>
<m_iNumExtra>3</m_iNumExtra>
<m_iNumStimuli>1</m_iNumStimuli>
<m_iNumTrials>1</m_iNumTrials>
<m_iNumZurichDistractors>1</m_iNumZurichDistractors>
</Block_0>
</Scheme_8>
</PAL>
</Task_0>
</ModuleConfigurations>
</MonkeyCantab>";


	fputs($file,$str);
	fclose($file);

}

?>