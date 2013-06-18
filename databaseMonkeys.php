<?php
function get_monkey($connexion, $id)
{
    if(isset($id))
    {
            $monkey_query = "SELECT CPS_Singes.nom_singe, CPS_Singes.date_naissance_singe, CPS_Singes.id_type, CPS_Singes.sexe, CPS_Singes.lieu_naissance, CPS_Singes.RFID_bras_gauche,CPS_Singes.RFID_bras_droit, CPS_Singes.descriptif_libre
FROM CPS_Singes
WHERE (((CPS_Singes.id_singe)=$id));";
    $rs = executeQuery($connexion, $monkey_query);
   // echo $monkey_query;
    return $rs;
    }

}



function get_monkeys($connexion)
{
    $monkeys_query = "SELECT CPS_Singes.id_singe, CPS_Singes.nom_singe, CPS_Singes.date_naissance_singe, CPS_Singes.id_groupe, CPS_Singes.id_type, CPS_Singes.sexe, CPS_Singes.RFID_bras_gauche,CPS_Singes.RFID_bras_droit
FROM CPS_Singes ORDER BY CPS_Singes.id_singe ;

";
    $rs = executeQuery($connexion, $monkeys_query);
    return $rs;
}

function insert_monkey($connexion, $monkey)
{
    $query = "INSERT INTO CPS_Singes
            (nom_singe, date_naissance_singe, id_groupe, id_type, sexe, RFID_bras_gauche,RFID_bras_droit,lieu_naissance,descriptif_libre,connecte)
            VALUES (
            '".str_replace("'", "''", $monkey['nom_singe'])."',
            '".str_replace("'", "''", $monkey['dateNaissance_singe'])."',
            ".str_replace("'", "''", $monkey['groupe_singe']).",
            ".str_replace("'", "''", $monkey['type_singe']).",
            '".$monkey['sexe_singe']."',
            '".str_replace("'", "''", $monkey['puce_singe_gauche'])."',
            '".str_replace("'", "''", $monkey['puce_singe_droit'])."',
            '".str_replace("'", "''", $monkey['lieuNaissance_singe'])."',
            '".str_replace("'", "''", $monkey['descriptif_singe'])."',
            'N'
            )";
                        //echo $query;
    $rs = executeQuery($connexion, $query);
}

function update_monkey($connexion, $monkey)
{
    $query = "UPDATE CPS_Singes SET 
    CPS_Singes.nom_singe         = '".str_replace("'", "''", $monkey['nom_singe'])."',
    CPS_Singes.date_naissance_singe      = '".str_replace("'", "''", $monkey['dateNaissance_singe'])."',
    CPS_Singes.id_groupe      =  ".str_replace("'", "", $monkey['groupe_singe']).",
    CPS_Singes.id_type = ".str_replace("'", "", $monkey['type_singe']).",
    CPS_Singes.sexe        =  '".$monkey['sexe_singe']."',
    CPS_Singes.lieu_naissance       = '".str_replace("'", "''", $monkey['lieuNaissance_singe'])."',
    CPS_Singes.RFID_bras_gauche        = '".str_replace("'", "''", $monkey['puce_singe_gauche'])."',
    CPS_Singes.RFID_bras_droit      = '".str_replace("'", "''", $monkey['puce_singe_droit'])."',
    CPS_Singes.descriptif_libre        = '".str_replace("'", "''", $monkey['descriptif_singe'])."'
    WHERE (((CPS_Singes.id_singe)=".$monkey['id_singe']."));";
    // echo $query;
    $rs = executeQuery($connexion, $query);
} 

function delete_monkey($connexion, $monkeyId)
{
    // $query = "DELETE FROM CPS_Lien_Chercheurs_Singes WHERE id_utilisateur = ".$monkey;
    // $rs = executeQuery($connexion, $query);
    $query = "DELETE * FROM CPS_Singes WHERE (((CPS_Singes.id_singe)=trim($monkeyId)));";
    
    $rs = executeQuery($connexion, $query);
    return $query;
}

function getMonkeyGroupe($connexion,$monkeyId)
{
    $query = "SELECT CPS_Singes.id_groupe FROM CPS_Singes WHERE (((CPS_Singes.id_singe)=trim($monkeyId)));";
        // echo $query;
        $rs = executeQuery($connexion, $query);
        return $rs;
}

 function getAllGroupes($connexion)
    {
        $query = "SELECT CPS_Groupes_Singes.id_groupe, CPS_Groupes_Singes.nom_groupe FROM CPS_Groupes_Singes;";
        // echo $query;
        $rs = executeQuery($connexion, $query);
        return $rs;
    }