<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");

?>

	<div id="main">
	<h2 class="title">Suppression d'un palier</h2>
	<hr id="under-title"/>
	
		<div class="box">
		<?php
		//print_r($_POST);
		include('connect.php');
		$conn = connect();
		foreach ($_POST['delete'] as $idpal => $state) {
			$conn->execute("DELETE FROM CPS_Lien_Paliers_Batteries WHERE id_palier=$idpal");
			$conn->execute("DELETE FROM CPS_Lien_Sessions_Paliers WHERE id_palier=$idpal");
			$conn->execute("DELETE FROM CPS_Paliers WHERE id_palier=$idpal");
		}
		?>
		</div>
		<span style='font-size:18px; color:black;'>Suppression de la palier correctement &eacute;ffectu&eacute;e !</span>
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