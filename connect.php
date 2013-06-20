<?php

//connection
/*
$conn = new COM ("ADODB.Connection") or die("Cannot start ADO");  
$user = "admin";
$password = "maimuta";
$connStr = "PROVIDER=Microsoft.Ace.OLEDB.12.0;User ID = ".$user.";Jet OLEDB:Database Password = ".$password." ; Data Source= C:\wamp\www\Acrobatt\Interface_primatologue\MonkeyCantab_sample_Access2007.accdb"; 
$conn->open($connStr);
*/


function connect()
{
	$dataSourcePath= "C:\wamp\www\Acrobatt\Interface_primatologue\MonkeyCantab_sample_Access2007.accdb";
	$conn = new COM ("ADODB.Connection") or die("Cannot start ADO"); 
	$user = "admin";
	$password = "maimuta";
	$connStr = "PROVIDER=Microsoft.Ace.OLEDB.12.0;User ID = ".$user.";Jet OLEDB:Database Password = ".$password." ; Data Source=".$dataSourcePath; 
	$conn->open($connStr); //Open the connection to the database 
	return $conn;
}

function deconnect($connexion){
	$connexion->Close();
	$connexion = null;
}

function executeQuery($connexion, $query){
	$rs = $connexion->execute($query);
	return $rs;
}

function closeResultSet($resultSet){
	$resultSet->Close();
	$resultSet = null;
}





?>