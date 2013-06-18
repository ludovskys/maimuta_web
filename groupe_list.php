<?php
    session_start();
    include("head.php");
    include('controlDataListGroupes.php');
?>
		

    <div id="main">
		<h2 class="title">Gestion des groupes</h2>
		<hr id="under-title"/>
			
			<div class="box">
			
				<form action="individualGroupe.php" method="POST">
					<input type="submit" value="Ajouter un groupe"/>
					<input type="hidden" value="insert" name="typeModif"/>
				</form></br>
					<?php 
						$listeGroupes=getGroupeList();
						echo $listeGroupes;
					 ?>
				<form action='./individualGroupe.php' method='POST' id='actionForm'>
					<input type='hidden' value='' id='typeModif' name='typeModif'/>
					<input type='hidden' value='' id='id_groupe' name='id_groupe'/>
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