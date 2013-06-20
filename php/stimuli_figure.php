<?php

$stimul_selectat = isset($stimul_selectat) ? $stimul_selectat : -1;
//echo "</select>---$stimul_selectat---";
$stimul_selectat = str_replace('univcam_', '', $stimul_selectat);
for ($i = 1; $i <= 54; $i++) {
	$curent = "IDED_shape_".$i;
	$test = $stimul_selectat == $curent ? " selected='selected'" : null;
	echo "<option value='$curent'$test>$curent</option>";
}

?>