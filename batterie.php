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

<select id="leftTasks" class="select" size="6">

</select>


<a href="#" onclick="switchPlace('toRight');"><img src="./images/arrow.png" style="width:30px; vertical-align:70px;" /></a>
<a href="#" onclick="switchPlace('toLeft');"><img src="./images/cross.png" style="width:30px; margin-left:-52px; vertical-align:0px;" /></a>


<select id="rightTasks" class="select" size="6">

</select>

<input type='button' onclick="envoiBatterie();" value="Go !" style="vertical-align:-50px; width:80px; margin-left:-200px; margin-right:30px;" />
<input type='button' onclick="reset();" value="Reset !" style="vertical-align:-50px; width:80px;" />
<div id='res' style="margin-left:270px; margin-top:15px; visibility:hidden;">Insertion correctement effectue !</div>


<script src='js/jquery-1.9.1.js'></script>
<script src='js/switch.js'></script>
<script src='js/retrieveData2.js'></script>
<script type='text/javascript'>
  
    $(document).ready(function(){
        recupData2('#leftTasks','liste','all_palier_query');
    });

</script>

	
<?php			
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