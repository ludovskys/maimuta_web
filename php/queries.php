<?php
/*
* this file contains all the queries we need to use
*
*/

$validTasks = "select Code_FR from CPS_Taches_Valides where Valide='O'";
$all_tache_query="select id_tache,nom_tache from CPS_Taches";
$all_session_query="select id_session,nom_session from CPS_Sessions";
$all_palier_query="select id_palier,nom_palier from CPS_Paliers";
$all_batterie_query="select id_batterie,nom_batterie from CPS_Batteries";
$all_campagne_query="select id_campagne,nom_campagne from CPS_Campagnes";

?>