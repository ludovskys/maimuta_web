<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include("head.php");
?>

<div id="main">
	<h2 class="title">Cr&eacute;ation d'une batterie compl&egrave;te de t&acirc;ches</h2>
	<hr id="under-title"/>
	
<!--	<div id="home_box">
		<table id="home_table" rules="none" frame="none">
			<tr>
				<th><h3>Nouveau / Nouvelle</h3></th>
				<th><h3>Listes</h3></th>
			</tr>
			<tr>
				<td class="column" align="center"><a class="home_link" href="nom.php?type=tache">T&acirc;che</a></td>
				<td class="column" align="center"><a class="home_link" href="liste.php?type=tache">Liste des t&acirc;ches</a></td>
			</tr>
			<tr>
				<td class="column" align="center"><a class="home_link" href="nom.php?type=session">Session</a></td>
				<td class="column" align="center"><a class="home_link" href="liste.php?type=session">Liste des sessions</a></td>
			</tr>
			<tr>
				<td class="column" align="center"><a class="home_link" href="nom.php?type=palier">Palier</a></td>
				<td class="column" align="center"><a class="home_link" href="liste.php?type=palier">Liste des paliers</a></td>
			</tr>
			<tr>
				<td class="column" align="center"><a class="home_link" href="nom.php?type=batterie">Batterie</a></td>
				<td class="column" align="center"><a class="home_link" href="liste.php?type=batterie">Liste des batteries</a></td>
			</tr>
		</table>
	</div>
-->

<span>Texte d'explication a venir</span>


		
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