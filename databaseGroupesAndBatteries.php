<?php
    
    function getAllBatteries($connexion)
    {
        $query = "SELECT CPS_Batteries.id_batterie, CPS_Batteries.nom_batterie FROM CPS_Batteries; ";
        // echo $query;
        $rs = executeQuery($connexion, $query);
        return $rs;
    }
    
    function getCurrentGroupeBatterie($connexion,$id)
    {
            $query = "SELECT CPS_Batteries.id_batterie
FROM CPS_Singes, CPS_Groupes_Singes, CPS_Lien_Singes_Batteries, CPS_Batteries
WHERE ((([CPS_Groupes_Singes.id_groupe])=[CPS_Singes.id_groupe]) AND (([CPS_Singes.id_singe])=[CPS_Lien_Singes_Batteries].[id_singe]) AND (([CPS_Lien_Singes_Batteries.id_batterie])=[CPS_Batteries].[id_batterie]) AND ((CPS_Groupes_Singes.id_groupe)=$id));";
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
    
    function changeGroupeBatterie($connexion,$batterieId,$groupeId)
    {

         $query = "UPDATE CPS_Lien_Batteries_Groupes SET id_batterie=$batterieId WHERE id_groupe=$groupeId;";
        // echo $query;
        $rs = executeQuery($connexion, $query);
        $query = "UPDATE CPS_Lien_Singes_Batteries SET id_batterie=$batterieId WHERE id_groupe=$groupeId;";
        // echo $query;
      $rs = executeQuery($connexion, $query);
    }

?>