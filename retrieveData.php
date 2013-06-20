<?php 

include("connect.php");

 $conn = connect();

 $str = "";
 
//declare the SQL statement that will query the database 
/*
	select Code_FR from CPS_Taches_Valides where Valide='O'
	
 */
$query = "select Code_FR from CPS_Taches_Valides where Valide='O'"; 
 //execute the SQL statement and return records 
$rs = $conn->execute($query); 

 $str.= "<option>--------------</option>"; 
 
while (!$rs->EOF)  //carry on looping through while there are records 
{ 
   
 
        $str.= "<option>" . $rs->Fields(0)->value . "</option>"; 

    
    $rs->MoveNext(); //move on to the next record 
} 
 
 

 
//close the connection and recordset objects freeing up resources 
$rs->Close(); 
$conn->Close();
echo $str;

?>  