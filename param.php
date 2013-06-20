<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			if(isset($_POST["name"]))
			{
				$_SESSION["name"] = $_POST["name"];
			}
			
			if(isset($_POST["id"]))
			{
				$_SESSION["id"] = $_POST["id"];
			}
			
			if(isset($_POST["type_tache"]))
			{
				$_SESSION["type_tache"] = $_POST["type_tache"];
			}
			
			include("head.php");
			
?>

	<div id="param_box">
		<span id="type_title">Veuillez param&eacute;trer la t&acirc;che <u><?php echo $_SESSION["name"] ?></u> du type <u><?php echo $_SESSION["type_tache"] ?></u>:</span>
		<form id="form_nom" method="post" action="analyse.php" style="margin-top:-5px;">
			<table id="table_param" frame="none" />
				<tr>
					<td align="right">
						<label>Temps min entre les essais en secondes (intervalle avec max) - *** temps entre inter-cibles</label>
					</td>
					<td style="padding-left:20px; padding-bottom:2px;">
						<input class="" type="text" name="param1" />
					</td>
				</tr>
				<tr>
					<td align="right" style="margin-right:30px; margin-bottom:10px;">
						<label>Temps max pour cette tache en minutes</label>
					</td>
					<td style="padding-left:20px; padding-bottom:2px;">
						<input class="" type="text" name="param2" />
					</td>
				</tr>
				<tr>
					<td align="right">
						<label>Temps max entre les essais en secondes - *** temps entre inter-cibles</label>
					</td>
					<td style="padding-left:20px; padding-bottom:2px;">
						<input class="" type="text" name="param3" />
					</td>
				</tr>
				<tr>
					<td align="right">
						<label>Temps de reponse max en secondes (delais)</label>
					</td>
					<td style="padding-left:20px; padding-bottom:2px;">
						<input class="" type="text" name="param4" />
					</td>
				</tr>
				<tr>
					<td align="right">
						<label>Nombre d'essais</label>
					</td>
					<td style="padding-left:20px; padding-bottom:2px;">
						<input class="" type="text" name="param5" />
					</td>
				</tr>
				<tr>
					<td align="right">
						<label>Numero du stimuli - figure affichee</label>
					</td>
					<td style="padding-left:20px; padding-bottom:2px;">
						<input class="" type="text" name="param6" />
					</td>
				</tr>
				<tr>
					<td align="right">
						<label>Figure affichee</label>
					</td>
					<td style="padding-left:20px; padding-bottom:2px;">
						<select name="param7">
							<option>univcam_IDED_shape</option>
							<option>univcam_IDED_line</option>
							<option>camcog_pal0</option>
							<option>camcog_pal1</option>
							<option>camcog_pal2</option>
							<option>camcog_pal3</option>
							<option>camcog_pal4</option>
							<option>camcog_mdms0</option>
							<option>camcog_mdms5</option>
							<option>camcog_mdms6</option>
							<option>camcog_mdms7</option>
							<option>camcog_star0</option>
							<option>camcog_star1</option>
							<option>camcog_star2</option>
							<option>camcog_star3</option>
							<option>camcog_star4</option>
							<option>camcog_nedi0shape</option>
							<option>camcog_nedi0line</option>
							<option>camcog_nedi1shape</option>
							<option>camcog_nedi1line</option>
							<option>camcog_nedi2shape</option>
							<option>camcog_nedi2line</option>
							<option>camcog_nedi3shape</option>
							<option>camcog_nedi3line</option>
							<option>camcog_nedi4shape</option>
							<option>camcog_nedi4line</option>
							<option>camcog_nedi5shape</option>
							<option>camcog_nedi5line</option>
							<option>camcog_nedi6shape</option>
							<option>camcog_nedi6line</option>
							<option>camcog_nedi7shape</option>
							<option>camcog_nedi7line</option>
							<option>camcog_nedi8shape</option>
							<option>camcog_nedi8line</option>
							<option>camcog_pal5</option>
						</select>
					</td>
				</tr>
			</table>
		
			<input id="valid" type="submit" value="Valider" style="margin-left:350px; margin-top:30px;" />
		</form>
	</div>

	<a class="back" href="tache.php" style="margin-top:10px;" >Retour</a>


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