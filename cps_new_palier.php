<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");

?>			
	<div id="main">
	<h2 class="title">Cr&eacute;ation d'un palier</h2>
	<hr id="under-title"/>
	
		<div class="box">
			<table cellspacing="10px" >
				<tr>
					<td colspan="3"><span style="margin-right:10px;">Nom du palier:</span><input class="champs" id="txtNomPalier" name="txtNomPalier" type="text" value="" size="14" />
					</td>
				</tr>
				<tr>
					<th><span style="display:block; width:200px; margin-top:30px;" >Liste des sessions disponnibles:</span></th>
					<th></th>
					<th><span style="display:block; width:220px; margin-top:30px; margin-left:20px;" >Liste des sessions du palier en cours:</span></th>
				</tr>
				<tr>
					<td><select style="margin-bottom:40px;" id="leftTasks" class="select" size="6"></select></td>
					<td><img class='switch' src="./images/arrow.png" style="width:30px; vertical-align:90px; margin-left:40px;" onclick="switchPlace('toRight');" />
						<img class='switch' src="./images/cross.png" style="width:30px; margin-left:-44px; vertical-align:50px;"  onclick="switchPlace('toLeft');"/>
						<img class='switch' src="./images/brosse.png" style="margin-left:-54px; vertical-align:10px; height:32px; width:46px;" onclick="reset();"  /></td>
					<td><select style="margin-left:30px; margin-bottom:40px;" id="rightTasks" class="select" size="6"></select></td>
				</tr>
				<tr>
					<td colspan="3" ><b>Crit&egrave;res de passage au palier suivant:</b></td>
				</tr>
				<tr>
					<td colspan="3">1) R&eacute;alisation d'un nombre minimum de: <input style="margin-right:5px; margin-left:5px;" id="nombreSessions" name="nombreSessions" type="text" size="2" /> sessions</td>
				</tr>
				<tr>
					<td colspan="3">2) Taux de bonnes r&eacute;ponses > ou = &agrave; <input style="margin-right:5px; margin-left:5px;" id="tauxreponse1" name="tauxreponse1" type="text" size="2" /> % concernant les <input style="margin-right:5px; margin-left:5px;" id="nombreDerSessions" name="nombreDerSessions" type="text" size="2" /> derni&egrave;res sessions</td>
				</tr>
				<tr>
					<td colspan="3">3) Taux de bonnes r&eacute;ponses > ou = &agrave; <input style="margin-right:5px; margin-left:5px;" id="tauxreponse2" name="tauxreponse2" type="text" size="2" /> % concernant les <input style="margin-right:5px; margin-left:5px;" id="nombreDerTaches" name="nombreDerTaches" type="text" size="2" /> derni&egrave;res t&acirc;ches</td>
				</tr>
				<tr>
					<td colspan="3"><input class="valid" type='button' onclick="envoiPalier();" value="Valider" style=" margin-top:40px; margin-right:40px; margin-left:220px; width:100px;"/></td>
				</tr>
			</table>
			
			<div id='res' style="margin-left:270px; margin-top:15px; visibility:hidden;">Insertion correctement effectue !</div>
		
		</div>

		<a class="back" href="main_page.php">Retour</a>

<script src='js/switch.js'></script>
<script src='js/retrieveData2.js'></script>
<script type='text/javascript'>
  
    $(document).ready(function(){
        recupData2('#leftTasks','liste','all_session_query');
    });

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