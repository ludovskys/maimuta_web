<?php 
	require('connect.php');
	require ('databaseGroupes.php');
	$connexion = connect();


function resituteInfos($connexion,$id)
{
    $data=null;
    $roles=null;
    $groupe = get_groupe($connexion, $id);
  
  $data.='$("#txtNom_groupe").val("'.$groupe[0].'");';
  $data.='$("#txtDescription_groupe").val("'.$groupe[1].'");';
  // $data.="$('#select_groupe_role').append('<option value=\'0\'>toto</option>');";
  // echo is_array($roles)? 'Array' : 'not an Array';
 // print_r($roles);
 
echo $data;
    return $data;
}


$data=null;

/**** partie execution du controleur ****/
if(isset($_POST['typeModif']))
{
    switch($_POST['typeModif'])
    {
        case "update":
            $data=resituteInfos($connexion,$_POST['id_groupe']);
            echo $data;
        break;
        
        case "insert":
            
            insert_groupe($connexion, $_POST);
        break;
        
        case "delete":
            $query=delete_groupe($connexion,$_POST['id_groupe']);
            // echo $query;
        break;
        
        case "applyUpdate":
            update_groupe($connexion, $_POST);
        break;
        
        
    }
}





?>