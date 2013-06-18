<?php

include("../connect.php");
 
 /*
  * retrieve data in an xml like string : data<nr>data<nr>data
  * nr means next row
  */
function retrieveQueryResult($query,$format)
{
    // result from the query
    $str=null;
    
    $conn = connect();

    $rs=$conn->execute($query);
    
     switch($format)
    {
        case "table":
        case "tableau":
        case "array":
            $str=arrayData($format,$rs);
        break;
        case "list":
        case "liste":
        case "select":
            $str=listData($format,$rs);
        break;
		case "":
			$str=singleData($format,$rs);
		break;
    }
    
       
    
    
        //close the connection and recordset objects freeing up resources 
   $conn=null;
    return $str;
}

function closeConnection($handle)
{
        $handle->Close();
}

function arrayData($query,$rs)
{
$str=null;
     while (!$rs->EOF)  //carry on looping through while there are records 
        { 
            //copy $str into $tempStr to be sure to have the correct data
            $tempStr=$str;
            
            // move through the columns
            for($i=0;$i<$rs->Fields->Count();$i++)
            {
                $tempStr.= $rs->Fields($i)->value ."<nd>";
            }
            
            $rs->MoveNext(); //move on to the next record
            
           /*
            * control if the next row is the last row
            * if it's the last row replace the content of $str with $tempStr and quit the while instruction
            * else add the separator to $tempStr and copy replace $str
            */
            
            if($rs->EOF)
            {
                $str=$tempStr;
                break;
            }
            else
            {
                $str= $tempStr."<nr>";
            }
        }
return $str;        
}

function listData($query,$rs)
{
$str=null;
     while (!$rs->EOF)  //carry on looping through while there are records 
        { 
            //copy $str into $tempStr to be sure to have the correct data
            $tempStr=$str;
            
            // move through the columns
            for($i=0;$i<$rs->Fields->Count();$i++)
            {
                $tempStr.= $rs->Fields($i)->value ."<id>";
            }
            
            $rs->MoveNext(); //move on to the next record
            
           /*
            * control if the next row is the last row
            * if it's the last row replace the content of $str with $tempStr and quit the while instruction
            * else add the separator to $tempStr and copy replace $str
            */
            
            if($rs->EOF)
            {
                $str=$tempStr;
                break;
            }
            else
            {
                $str= $tempStr."<nr>";
            }
        } 
        
        return $str;
}

function singleData($query,$rs)
{
$str=null;
     while (!$rs->EOF)  //carry on looping through while there are records 
        { 
            //copy $str into $tempStr to be sure to have the correct data
            $tempStr=$str;
            
            // move through the columns
            for($i=0;$i<$rs->Fields->Count();$i++)
            {
                $tempStr.= $rs->Fields($i)->value;
            }
            
            $rs->MoveNext(); //move on to the next record
            
           /*
            * control if the next row is the last row
            * if it's the last row replace the content of $str with $tempStr and quit the while instruction
            * else add the separator to $tempStr and copy replace $str
            */
            
            if($rs->EOF)
            {
                $str=$tempStr;
                break;
            }
            else
            {
                $str= $tempStr."<nr>";
            }
        } 
        
        return $str;
}

?>