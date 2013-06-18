<?php

/*
* includes the data access interface
*/
include("modelRetrieveQueriesResults.php");

/*
* include the file containing the queries
*/
include("queries.php");


function defineFormat($format)
{
    /*
    * $tag contains the corresponding HTML tag
    */
    
    $tag="";
    
    switch($format)
    {
        case "table":
        case "tableau":
        case "array":
            $tag="table";
        break;
        case "list":
        case "liste":
        case "select":
            $tag="select";
        break;
		case "single":
			$tag="";
		break;
    }
    
    return $tag;
}

function formatData($format,$data)
{
    /*
    * contains the formated data
    */
    $formatedData="";
    
    /*
    * array with the rough data
    */
    
    $unformatedData=explode("<nr>",$data);
    
    /*
    * get the tag corresponding to the format
    */
    $tag=defineFormat($format);
    
    switch($tag)
    {
        case "table":
            // $formatedData.="<table>";
            foreach($unformatedData as $cell)
            {
                $tempArray=explode("<nd>",$cell);
                $formatedData.="<tr>";
                foreach($tempArray as $data)
                {
                    $formatedData.="<td>".$data."</td>";
                }
                $formatedData.="</tr>";
            }
            // $formatedData.="</table>";
            
        break;
        case "select":
        //$formatedData.="<select>";
            foreach($unformatedData as $option)
            {
				//if($option!='')
				//{
					$formatedData.="";
                  
            
					$tempArray=explode("<id>",$option);
					$formatedData.="<option value='".$tempArray[0]."'>";
					$formatedData.=$tempArray[1]."</option>";
				//}
            
            
            }
            //$formatedData.="</select>";
        break;
		case "":
			foreach($unformatedData as $option)
            {
					$formatedData.="";

					$tempArray=explode("<nr>",$option);
					$formatedData.=$tempArray[0];
            }
		break;
    }
    

    return $formatedData;
}

function executeQuery2($query,$format)
{
    /*
     * variable declaration
     */
     $res=null;
     $data=null;
     $debug=true;
     
     /*
     * get data from the access database
     * string format
     */
     $data=retrieveQueryResult($query,$format);
     
     /*
     * format the data
     */
     $res=formatData($format,$data);
     
     if($debug)
     {
        echo $res;
      }
      else
      {
      // retrieve data to the view
        return $res;
      }
}

/*if($_POST['query'] == '')
{
	$query = $$_POST['query']."where "
}*/
executeQuery2($$_POST['query'],$_POST['format']);

?>