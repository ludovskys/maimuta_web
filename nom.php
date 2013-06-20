<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			if(isset($_GET["type"]))
			{
				$_SESSION["type"] = $_GET["type"];
			}
			
			include("head.php");

			$type = trim($_SESSION["type"]);
		
			echo '<div id="name_box">';
				echo '<form id="form_nom" method="post" action="'.$type.'.php">';
					echo '<input id="name" class="connect" name="name" type="text" value="Nom '.$type.'" size="20" onclick=toto("'.$type.'"); onBlur=titi("'.$type.'"); />';
					echo '<input id="valid" type="submit" value="Valider" />';
				echo '</form>';
			echo '</div>';

			echo '<a class="back" href="main_page.php">Retour</a>';
		
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

<script>

function toto(valeur)
{
	var text = document.getElementById("name");
	if(text.value=="Nom "+valeur)
	{
		text.value="";
	}
}

function titi(valeur)
{
	var text = document.getElementById("name");
	if(text.value=="")
	{
		text.value="Nom "+valeur;
	}
}

</script>