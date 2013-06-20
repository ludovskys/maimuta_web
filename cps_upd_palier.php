<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");

?>			
	<div id="main">
	<h2 class="title">Modification d'un palier</h2>
	<hr id="under-title"/>
	
		<div class="box">
			<table cellspacing="10px" >
				<tr>
					<td colspan="3"><span style="margin-right:10px;">Nom du palier:</span>
					<select name="txtNomPalier" id="txtNomPalier">
					<option value="0">&raquo; S&eacute;lectionner un palier</option>
					<?php
					include('connect.php');
					$conn = connect();
					$res = $conn->execute("SELECT * FROM CPS_Paliers ORDER by nom_palier ASC");
					while (!$res->EOF) {
						$id = $res->Fields(0)->value;
						$nom = $res->Fields(1)->value;
						$res->MoveNext();
						echo "<option value='$id'>$nom</option>";
					}
					?>
					</select>
					</td>
				</tr>
				<tr>
					<th><span style="display:block; width:200px; margin-top:30px;" >Liste des sessions disponibles:</span></th>
					<th></th>
					<th><span style="display:block; width:220px; margin-top:30px; margin-left:20px;" >Listes des sessions du palier en cours:</span></th>
				</tr>
				<tr>
					<td><select id="leftTasks" class="select" size="6"></select></td>
					<td><img class='switch' src="./images/arrow.png" style="width:30px; vertical-align:70px; margin-left:40px;" onclick="switchPlace('toRight');" />
						<img class='switch' src="./images/cross.png" style="width:30px; margin-left:-44px; vertical-align:30px;"  onclick="switchPlace('toLeft');"/>
						<img class='switch' src="./images/brosse.png" style="margin-left:-54px; vertical-align:-10px; height:32px; width:46px;" onclick="reset();"  /></td>
					<td><select style="margin-left:30px;" id="rightTasks" class="select" size="6"></select></td>
				</tr>
				<tr>
					<td colspan="3"><input class="valid" type='button' onclick="modifierPalier();" value="Valider" style=" margin-top:40px; margin-right:40px; margin-left:220px; width:100px;"/>
									
					</td>
				</tr>
			</table>
			
			<div id='res' style="margin-left:270px; margin-top:15px; visibility:hidden;">Insertion correctement effectue !</div>
		
		</div>

		<a class="back" href="main_page.php">Retour</a>

<script src='js/switch.js'></script>
<script src='js/retrieveData2.js'></script>
<script type='text/javascript'>
  
    $(document).ready(function(){

        recupData2('#leftTasks', 'liste','all_session_query');
	
		$("#txtNomPalier").bind('change', function() {
			id = $("#txtNomPalier").val();
			if (id != 0) {
				$.ajax({
					type: "POST",
					url: "./php/queriesModifier.php",
					data: "id="+id+"&type=palier",
					success: function(data){
						$("#rightTasks").html(data);
					}
				});
			} else {
				$("#rightTasks").empty();
			}
		});
	
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