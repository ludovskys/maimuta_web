<?php
function get_groupe($connexion, $id)
{
    if(isset($id))
    {
            $groupe_query = "SELECT CPS_Groupes_Singes.nom_groupe,CPS_Groupes_Singes.description_groupe
FROM CPS_Groupes_Singes
WHERE (((CPS_Groupes_Singes.id_groupe)=$id));";
	$rs = executeQuery($connexion, $groupe_query);
   // echo $groupe_query;
    return $rs;
    }

}



function get_groupes($connexion)
{
	$groupes_query = "SELECT CPS_Groupes_Singes.id_groupe,CPS_Groupes_Singes.nom_groupe,CPS_Groupes_Singes.description_groupe
FROM CPS_Groupes_Singes ORDER BY CPS_Groupes_Singes.id_groupe ;

";
	$rs = executeQuery($connexion, $groupes_query);
    return $rs;
}

function insert_groupe($connexion, $groupe)
{
    $query = "INSERT INTO CPS_Groupes_Singes
			(nom_groupe, description_groupe)
			VALUES (
            '".str_replace("'", "''", $groupe['nom_groupe'])."',
			'".str_replace("'", "''", $groupe['description_groupe'])."'
            )";
                        // echo $query;
	$rs = executeQuery($connexion, $query);
   $query = "INSERT INTO CPS_Lien_Batteries_Groupes
			(id_batterie, id_groupe)
            SELECT 0,max(id_groupe) FROM CPS_Groupes_Singes
			;";
                        // echo $query;
	$rs = executeQuery($connexion, $query);
}

function update_groupe($connexion, $groupe)
{
    $query = "UPDATE CPS_Groupes_Singes SET 
CPS_Groupes_Singes.nom_groupe         = '".str_replace("'", "''", $groupe['nom_groupe'])."',
CPS_Groupes_Singes.description_groupe      = '".str_replace("'", "''", $groupe['description_groupe'])."'
WHERE (((CPS_Groupes_Singes.id_groupe)=".$groupe['id_groupe']."));";
echo $query;
	$rs = executeQuery($connexion, $query);
} 

function delete_groupe($connexion, $groupeId)
{
	// $query = "DELETE FROM CPS_Lien_Chercheurs_Singes WHERE id_utilisateur = ".$groupe;
	// $rs = executeQuery($connexion, $query);
	$query = "DELETE * FROM CPS_Groupes_Singes WHERE (((CPS_Groupes_Singes.id_groupe)=trim($groupeId)));";
    
	$rs = executeQuery($connexion, $query);
    echo count($rs);
    return $query;
}

function addMonkeyToGroup($id)
{
    
}