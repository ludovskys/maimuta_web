<?php

function get_Session_Type_Tache($connexion, $id)
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

?>