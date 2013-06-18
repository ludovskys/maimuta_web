<?php

/*
* parse file into a xml like string and write it into a .xml file located in the results folder
*
*/
    $handle = fopen("../resultats/res.xml", "w+");
    $tab=$_POST['tab'];
    $tab=explode(',',$tab);
    for($i=0;$i<count($tab);$i++)
    {
        $str="<toto>".$tab[$i]."</toto>\n";
        fwrite($handle,$str);
     }
    fclose($handle);
?>
