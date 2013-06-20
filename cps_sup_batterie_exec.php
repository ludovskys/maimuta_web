<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");

?>

	<div id="main">
	<h2 class="title">Suppression d'une batterie</h2>
	<hr id="under-title"/>
	
		<div class="box">
		<?php
		//print_r($_POST);
		include('connect.php');
		$conn = connect();
		foreach ($_POST['delete'] as $idbatt => $state) {
			$conn->execute("DELETE FROM CPS_Lien_Paliers_Batteries WHERE id_batterie=$idbatt");
			$conn->execute("DELETE FROM CPS_Batteries WHERE id_batterie=$idbatt");
		}
		?>
		</div>
		<span style='font-size:18px; color:black;'>Suppression de la batterie correctement &eacute;ffectu&eacute;e !</span>
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