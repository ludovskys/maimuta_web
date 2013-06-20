<?php
    
//if(isset($_SESSION['role']) && ($_SESSION['role']==1 || $_SESSION['role']==2)){

	require('connect.php');
    require('databaseGroupes.php');
    
    function getGroupeList()
    {

        $connexion = connect();
        $resultStr="";
        
        $resultStr.="<table cellpadding='4' border=1 bgcolor=white style='min-width:700px;'>";
        $resultStr.="<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>Description</th>
		</tr>";

        $groupes = get_groupes($connexion);
        while (!$groupes->EOF) 
        { 
            
            
            $resultStr.=" <tr>";
            $resultStr.="
                            <td align='center'>$groupes[0]</td>
                            <td align='center'>$groupes[1]</td>
                            <td align='center' style='min-width:200px;'>$groupes[2]</td>
                            
                        ";


            $resultStr.="<td style='width:160px;' align='center'>
                           <input type='button' value='Editer' onclick='updateGroupe($groupes[0]);'/>
                           <input type='button' value='Supprimer' onclick='deleteGroupe($groupes[0]);'/>
                        </td>";

            $resultStr.="</tr>";
            
            $groupes->MoveNext();
            
        }
        $resultStr.="</table>";

        return $resultStr;
    }
//	}

?>
