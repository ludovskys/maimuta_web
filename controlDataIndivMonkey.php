<?php 
	require('connect.php');
	require ('databaseMonkeys.php');
	$connexion = connect();

function resituteInfos($connexion,$id)
{
   
    $data=null;
    $roles=null;
    $monkey = get_monkey($connexion, $id);
    $all_groupes=getAllGroupes($connexion);
    $all_types=getAllTypes($connexion);
    $monkeyGroupe=getMonkeyGroupe($connexion, $id);
    $monkeyType=getMonkeyType($connexion, $id);

    $data.="$('#groupe_singe').empty();";
    $data.="$('#groupe_singe').append('<option id=\"0\" value=\"0\">- - - - - - - - -</option>');";
	
	$data.="$('#txtType_singe').empty();";
    $data.="$('#txtType_singe').append('<option id=\"0\" value=\"0\">- - - - - - - - -</option>');";

    $data.='$("#txtNom_singe").val("'.$monkey[0].'");';
    $data.='$("#txtDateNaissance_singe").val("'.$monkey[1].'");';
    
    $tmpdata="";
    $tmpdata2="";

    while(!$all_groupes->EOF) 
    { 
        if($monkeyGroupe[0]==$all_groupes[0])
        {
            $tmpdata.="$('#groupe_singe').append('<option selected=\'selected\'  id=\'$all_groupes[0]\' value=\'$all_groupes[0]\'>$all_groupes[1]</option>');";

        }
        else
        {
            $tmpdata.="$('#groupe_singe').append('<option  id=\'$all_groupes[0]\' value=\'$all_groupes[0]\'>$all_groupes[1]</option>');";
        }

        $all_groupes->MoveNext();

    }
	
	while(!$all_types->EOF) 
    { 
        if($monkeyType[0]==$all_types[0])
        {
            $tmpdata2.="$('#txtType_singe').append('<option selected=\'selected\'  id=\'$all_types[0]\' value=\'$all_types[0]\'>$all_types[1]</option>');";

        }
        else
        {
            $tmpdata2.="$('#txtType_singe').append('<option  id=\'$all_types[0]\' value=\'$all_types[0]\'>$all_types[1]</option>');";
        }

        $all_types->MoveNext();

    }

    $data.=$tmpdata;
    $data.=$tmpdata2;

    //$data.='$("#txtType_singe").val('.$monkey[2].');';
    $data.='$("#txtLieuNaissance_singe").val("'.$monkey[4].'");';
    $data.='$("input[name=radioButton_sex][value='.$monkey[3].']").prop("checked",true);';
    $data.='$("#txtPuce_singe_gauche").val("'.$monkey[5].'");';
    $data.='$("#txtPuce_singe_droit").val("'.$monkey[6].'");';
    $data.='$("#txtDesc_singe").val("'.$monkey[7].'");';

    // $data.="$('#select_monkey_role').append('<option value=\'0\'>toto</option>');";
    // echo is_array($roles)? 'Array' : 'not an Array';
    // print_r($roles);

    // echo $data;
    return $data;
}


$data=null;

/**** partie execution du controleur ****/
if(isset($_POST['typeModif']))
{
    switch($_POST['typeModif'])
    {
        case "update":
            $data=resituteInfos($connexion,$_POST['id_singe']);
            echo $data;
        break;
        
        case "insert":
            
            insert_monkey($connexion, $_POST);
        break;
        
        case "delete":
            $query=delete_monkey($connexion,$_POST['id_singe']);
            // echo $query;
        break;
        
        case "applyUpdate":
            update_monkey($connexion, $_POST);
        break;
        
        
    }
}

if(isset($_POST['instruction']))
{
    $all_groupes=getAllGroupes($connexion);
    $data="";
     while(!$all_groupes->EOF) 
        { 
          
            $data.="$('#groupe_singe').append('<option  id=\'$all_groupes[0]\' value=\'$all_groupes[0]\'>$all_groupes[1]</option>');";
          
          
          $all_groupes->MoveNext();
          
        }
        echo $data;
        
}

if(isset($_POST['instructionType']))
{
	
    $all_types=getAllTypes($connexion);
    $data1="";
     while(!$all_types->EOF) 
        { 
          
            $data1.="$('#txtType_singe').append('<option  id=\'$all_types[0]\' value=\'$all_types[0]\'>$all_types[1]</option>');";
          
          
          $all_types->MoveNext();
          
        }
        echo $data1;
        
}



?>