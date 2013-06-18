<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");

?>

	<div id="main">
	<h2 class="title">Modification d'une t&acirc;che</h2>
	<hr id="under-title"/>
	
		<div class="box">
			<form style="margin-left:100px;" method="post" action="cps_upd_tache_exec.php">
			
		
		
		
		
		
		
				<input class="valid" type="submit" value="Valider" /></td>
			</form>
		</div>

		<a class="back" href="main_page.php">Retour</a>
			
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