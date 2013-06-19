<!DOCTYPE html>
<html lang="fr">
  <head>
	  <meta charset=utf-8 />
	  <title>Centre de Primatologie Strasbourg</title>
	  <meta http-equiv="Content-Language" content="French" />
	  <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />
	  <link rel="shortcut icon" href="style/img/macaque.png">
	  <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	  <script type="text/javascript" src="js/retrieveData.js"></script>
	  <script type="text/JavaScript" src="js/admin_singe.js"></script>
	  <script type="text/JavaScript" src="js/admin_groupe.js"></script>
	  <link href="style/jquery-ui.css" rel="stylesheet" />
	  <script src="js/jquery-ui.js"></script>
	  <script type="text/javascript">
		  	$(function() {
		  		$( "#menu" ).menu({
					position: {at: "left bottom"}
				});
			});
	  </script>
      <style type="text/css">
        .ui-menu { overflow: hidden;}
        .ui-menu .ui-menu { overflow: visible !important; }
        .ui-menu > li { float: left; display: block; width: auto !important; }
        .ui-menu > li { margin: 5px 5px !important; padding: 0 0 !important; }
        .ui-menu > li > a { float: left; display: block; clear: both; overflow: hidden;}
        .ui-menu .ui-menu-icon { margin-top: 0.3em !important;}
        .ui-menu .ui-menu .ui-menu li { float: left; display: block;}
      </style>
  </head>
  <body>
    <header>
		<h1 id="title"><a style="color:LemonChiffon;" href="main_page.php">Centre<br/>de primatologie</br>Strasbourg</a></h1>
		<div id="box-connection2" >
			<div id="good-connection">
				<span style="color:white;">Bonjour <u><?php echo $_SESSION["user"] ?></u></span>
				<a id="deconnection" href="deconnection.php">D&eacute;connexion</a>
			</div>
		</div>
    </header>
	<ul id="menu">
	  <li><a href="#">T&acirc;che</a>
	  	<ul style="background-color: white;">
		  <li><a href="cps_new_tache.php">Nouvelle t&acirc;che</a>|</li>
		  <li><a href="cps_upd_tache.php">Modification d'une t&acirc;che</a>|</li>
		  <li><a href="cps_sup_tache.php">Suppression d'une t&acirc;che</a></li>
		</ul>
	  </li>
	  <li><a href="#">Session</a>
		<ul style="background-color:white;">
		  <li><a href="cps_new_session_type.php">Nouvelle session type</a>|</li>
		  <li><a href="cps_new_session.php">Nouvelle session</a>|</li>
		  <li><a href="#">Modification d'une session</a>|</li>
		  <li><a href="#">Suppression d'une session</a></li>
		</ul>
	  </li>
	  <li><a href="#">Palier</a>
	  	<ul style="background-color:white;">
		  <li><a href="cps_new_palier.php">Nouveau palier</a>|</li>
		  <li><a href="cps_upd_palier.php">Modification d'un palier</a>|</li>
		  <li><a href="cps_sup_palier.php">Suppression d'un palier</a></li>
		</ul>
	  </li>
	  <li><a href="#">Batterie</a>
	  	<ul style="background-color:white;">
		  <li><a href="cps_new_batterie.php">Nouvelle batterie</a>|</li>
		  <li><a href="cps_upd_batterie.php">Modification de la batterie</a>|</li>
		  <li><a href="cps_sup_batterie.php">Suppression de la batterie</a></li>
		</ul>
	  </li>
	  <li><a href="#">Administration</a>
		 <ul style="background-color:white;">
			<li><a href="monkey_list.php">Singes</a>|</li>
			<li><a href="groupe_list.php">Groupes</a>|</li>
			<li><a href="batterie_groupe.php">Liaison groupe batterie</a></li>
		</ul>
	  </li>
	</ul>
	
	