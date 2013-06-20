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

<span>

Pour pouvoir créer une batterie complète, voici les démarches à effectuer : </br>

<ul class="presentationlist">
<li>créer des <a class="lienpresentationlist" href="cps_new_tache.php">tâches</a>. Pour créer une tâche, donner un nom à cette tâche puis son type, 
	et remplisser les paramètres du type de la tâche en conséquence. Vous pouvez créer différents types de tâches : TP, SOSS, CSRT, PAL ;</li>
<li>une fois les tâches crées, créer des <a class="lienpresentationlist" href="cps_new_session_type.php">sessions types</a> : pour cela, 
	donner un nom à votre session type, puis le nombre de tâches voulues;</li>
<li>ensuite, créer des <a class="lienpresentationlist" href="cps_new_session.php">sessions</a> : pour cela, choississez une session type : 
	la liste des tâches liées à cette session type s'affiche automatiquement dans la liste à droite : 
	vous avez la possibilité de mélanger les tâches et de faire quelques ajustements en changeant l'ordre des tâches dans la session;</li>
<li>création des <a class="lienpresentationlist" href="cps_new_palier.php">paliers</a> : pour pouvoir créer un palier, donner un nom et choississez
 les sessions que vous voulez ajouter dans le palier, puis valider;
<li>créations des <a class="lienpresentationlist" href="cps_new_batterie.php">batteries</a> : la démarche est la même que pour les paliers.</li>
</ul>

Vous avez aussi la possibilité de :
<ul class="presentationlist">
<li>lister des <a class="lienpresentationlist" href="monkey_list.php">singes</a>, 
	lister des <a class="lienpresentationlist" href="groupe_list.php">groupes</a></li>
<li>éditer des singes, éditer des groupes</li>
<li>ajouter un <a class="lienpresentationlist" href="individualMonkey.php">singe</a>,
	ajouter un <a class="lienpresentationlist" href="individualGroupe.php">groupes</a></li>
</ul>

Enfin, vous pouvez lier une batterie à un groupe <a class="lienpresentationlist" href="batterie_groupe.php">ici</a>.

</span>


		
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