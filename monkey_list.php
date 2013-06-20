<?php
    session_start();
    include("head.php");
    include('controlDataListMonkey.php');
?>
		

    <div id="main">
		<h2 class="title">Gestion des pnhs</h2>
		<hr id="under-title"/>
			
			<div class="box" style="width:960px;" >
			
				<form action="individualMonkey.php" method="POST">
					<input type="submit" value="Ajouter un pnh"/>
					<input type="hidden" value="insert" name="typeModif"/>
				</form></br>
				<?php 
					$listeSinges=getMonkeyList();
					echo $listeSinges;
				 ?>
				<form action='./individualMonkey.php' method='POST' id='actionForm'>
					<input type='hidden' value='' id='typeModif' name='typeModif'/>
					<input type='hidden' value='' id='id_singe' name='id_singe'/>
				</form>
				
			</div>
			
			<a class="back" href="main_page.php">Retour</a>
			
			
	<style type="text/css">
	table {
		border: 2px solid;
		background-color: white;
		border-collapse:collapse;
	}
	td, th {
		border: 1px solid;
	}
	tr:hover{
        background-color: ThreeDLightShadow;
    }
	</style>
<?php
    include ('foot.php');
?>