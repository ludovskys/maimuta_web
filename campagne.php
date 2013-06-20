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


A venir campagne
			
			
			
<?php			
			echo '<a class="back" href="nom.php">Retour</a>';
		
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