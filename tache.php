<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			if(isset($_POST["name"]))
			{
				$_SESSION["name"] = $_POST["name"];
			}
		
			include("head.php");
			
?>

	<div id="type_box">
		<span id="type_title">Choississez le type de t&acirc;che pour <u><?php echo $_SESSION["name"] ?></u>:</span>
		<form id="form_nom" method="post" action="param.php" style="margin-top:-5px;">
			<select id="type_list" name="type_tache" size="1">
			</select>
			<input id="valid" type="submit" value="Valider" style="margin-left:180px; margin-top:30px;" />
		</form>
	</div>

	<a class="back" href="nom.php">Retour</a>

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