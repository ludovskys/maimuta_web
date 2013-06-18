<?php session_start();

if(isset($_SESSION["connecte"]))
{
	if($_SESSION["connecte"] == "ok")
	{
		//include("head.php");
		
		echo '<img src="images/FIGURES_CORRESPONDANCES.jpg" alt="figures" />';
		
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