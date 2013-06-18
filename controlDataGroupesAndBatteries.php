<?php
    include('databaseGroupesAndBatteries.php');
    require('connect.php');
    $connexion = connect();
    $res="";
    if($_POST['instruction'] =="getAllBatteries")
    {
        $batteriesArray=getAllBatteries($connexion);
        $batterieGrpCourant=getCurrentGroupeBatterie($connexion,$_POST['groupeId']);
        // echo $batterieGrpCourant[0];
        $res.="$('#batterie_groupe_selected').empty();";
         $res.="$('#batterie_groupe_selected').append('<option id=\"0\" value=\"0\">- - - - - - - - -</option>');";
        while(!$batteriesArray->EOF) 
        { 
            if($batterieGrpCourant[0]==$batteriesArray[0])
            {
                $res.="$('#batterie_groupe_selected').append('<option selected=\"selected\" id=\"$batteriesArray[0]\" value=\"$batteriesArray[0]\">$batteriesArray[1]</option>');";
            }
            else
            {
                $res.="$('#batterie_groupe_selected').append('<option id=\"$batteriesArray[0]\" value=\"$batteriesArray[0]\">$batteriesArray[1]</option>');";
            }
           
            $batteriesArray->MoveNext();
        }
       
        // return json_encode($batteriesArray);
    }
    else if($_POST['instruction'] =="getAllGroupes")
    {
         $groupesArray=getAllGroupes($connexion);
        $res.="$('#groupes').append('<option id=\"0\">- - - - - - - - -</option>');";
        while(!$groupesArray->EOF) 
        { 
           $res.="$('#groupes').append('<option value=\"$groupesArray[0]\">$groupesArray[1]</option>');";
            $groupesArray->MoveNext();
        }
    }
    else if($_POST['instruction'] =="changeBatterieGroupe")
    {
        changeGroupeBatterie($connexion,$_POST['batterieId'],$_POST['groupeId']);
    }
     echo $res;
?>