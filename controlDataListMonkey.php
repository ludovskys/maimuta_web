<?php
    
//if(isset($_SESSION['role']) && ($_SESSION['role']==1 || $_SESSION['role']==2)){

	require('connect.php');
    require('databaseMonkeys.php');
    
    function getMonkeyList()
    {

        $connexion = connect();
        $resultStr="";
        
        $resultStr.="<table cellpadding='4' border='1' bgcolor='white'>";
        $resultStr.="<tr>
			<th>ID</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Groupe</th>
            <th>Type</th>
            <th>Sexe</th>
            <th>RFID </br>Bras gauche</th>
            <th>RFID </br>Bras droit</th>
		</tr>";

        $monkeys = get_monkeys($connexion);
        while (!$monkeys->EOF) 
        { 
            
            
            $resultStr.=" <tr>";
            $resultStr.="
                            <td align='center'>$monkeys[0]</td>
                            <td align='center'>$monkeys[1]</td>
                            <td align='center'>$monkeys[2]</td>
                            <td align='center'>$monkeys[3]</td>
                            <td align='center'>$monkeys[4]</td>
                            <td align='center'>$monkeys[5]</td>
                            <td align='center'>$monkeys[6]</td>
                            <td align='center'>$monkeys[7]</td>
                        ";


            $resultStr.="<td>
                           <input type='button' value='Editer' onclick='updateMonkey($monkeys[0]);'/>
                           <input type='button' value='Supprimer' onclick='deleteMonkey($monkeys[0]);'/>
                        </td>";

            $resultStr.="</tr>";
            
            $monkeys->MoveNext();
            
        }
        $resultStr.="</table>";

        return $resultStr;
    }
//	}

?>
