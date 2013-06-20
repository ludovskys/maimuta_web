<?php session_start();

//connexion
include('connect.php');

if(isset($_SESSION["connecte"]))
{
	if($_SESSION["connecte"] == "ok")
	{
		include("head.php");
		
		if((isset($_POST['task_name']) && isset($_POST['type_tache'])) && (($_POST['task_name'] != '') && ($_POST['type_tache'] != '------')))
		{
			//echo "nom:".$_POST['task_name']."</br>";
			//echo "type:".$_POST['type_tache']."</br>";
			
			$name = $_POST['task_name'];
			$type = $_POST['type_tache'];
	
			if($type == "Training Program")
			{
				$j = 8;
				$t = "TP";
			}
			else if($type == "DMS / DNMS")
			{
				$j = 9;
				$t = "DS";
			}
			else if($type == "SOSS")
			{
				$j = 10;
				$t = "SO";
			}
			else if($type == "CSRT")
			{
				$j = 8;
				$t = "CS";
			}
			else if($type == "PAL")
			{
				$j = 11;
				$t = "PA";
			}

			// récupération des éléments du formulaire
			for($i = 1; $i <= $j; $i++)
			{
				if(isset($_POST['elem'.$t.$i]))
				{
					$elem[$i] = $_POST['elem'.$t.$i];
				}
				else
				{
					$elem[$i] = "";
				}
				//echo "Elem".$i." = ".$elem[$i].'</br>';
			}

			$conn = connect();
			
			// test si le nom existe
			$query = "select nom_tache from CPS_Taches where nom_tache='".$name."'";
			$rs = $conn->execute($query); 

			if(!$rs->EOF)
			{ 
				$result = $rs->Fields(0)->value;
				$exist = "present";
			}
			else
			{
				$exist = "non present";
			}

			
			// remplace les espaces par _ pour le nom du fichier uniquement
			$namefile = str_replace(' ', '_', $name);
			
			
			// écriture du fichier xml
			if($exist == "non present")
			{
				if($type == "Training Program")
				{
					include("TP.php");
				}
				else if($type == "DMS / DNMS")
				{
					if($elem[7] == 0)
					{
						include("DNMS.php");
					}
					else
					{
						if($elem[8] == 1)
						{
							include("DMS_1.php");
						}
						else if($elem[8] == 2)
						{
							include("DMS_2.php");
						}
						else if($elem[8] == 3)
						{
							include("DMS_3.php");
						}
					}
				}
				else if($type == "SOSS")
				{
					if($elem[6] == 0)
					{
						include("SOSS.php");
					}
					else if($elem[6] == 1)
					{
						include("SOSS_M.php");
					}
				}
				else if($type == "CSRT")
				{
					if($elem[2] == 0)
					{
						include("CSRT_1.php");
					}
					else if($elem[2] == 1)
					{
						include("CSRT_3.php");
					}
					else if($elem[2] == 2)
					{
						include("CSRT_5.php");
					}
					else if($elem[2] == 3)
					{
						include("CSRT_2.php");
					}
				}
				else if($type == "PAL")
				{
					if($elem[4] == 1 && $elem[9] == 1)
					{
						include("PAL_1_1.php");
					}
					else if($elem[4] == 1 && $elem[9] == 2)
					{
						include("PAL_1_2.php");
					}
					else if($elem[4] == 1 && $elem[9] == 3)
					{
						include("PAL_1_3.php");
					}
					else if($elem[4] == 2 && $elem[9] == 1)
					{
						include("PAL_2_1.php");
					}
					else if($elem[4] == 2 && $elem[9] == 2)
					{
						include("PAL_2_2.php");
					}
					else if($elem[4] == 2 && $elem[9] == 3)
					{
						include("PAL_2_3.php");
					}
					else if($elem[4] == 3 && $elem[9] == 2)
					{
						include("PAL_3_2.php");
					}
					else if($elem[4] == 3 && $elem[9] == 3)
					{
						include("PAL_3_3.php");
					}
					else if($elem[4] == 4 && $elem[9] == 3)
					{
						include("PAL_4_3.php");
					}
				}
			}
			else
			{
				echo "<span style='font-size:18px; color:red;'>Ce nom de fichier XML &eacute;xiste d&eacute;j&agrave;</span></br>";
			}
			// recherche de l'id du type de tache pour l'insertion dans la base
			$query = "select Task_Type from CPS_Taches_Valides where code_FR='".$type."'";
			
			$rs = $conn->execute($query); 

			while (!$rs->EOF)
			{ 
				$id = $rs->Fields(0)->value;
				$rs->MoveNext();
			} 
			
			// si le nom n'existe pas insertion dans la base
			if($exist == "non present")
			{
				// insertion de la tache dans la base avec le lien vers le fichier 
				$query2 = "insert into CPS_Taches (nom_tache, Task_Type, lien_xml_tache) values ('".$name."', ".$id.", 'resultats/".$namefile.".xml')";
				$rs = $conn->execute($query2);
				echo "<span style='font-size:18px; color:black;'>Cr&eacute;ation de la t&acirc;che correctement &eacute;ffectu&eacute;e !</span>";
				
			}
			else
			{
				echo "<span style='font-size:18px; color:red;'>Ce nom de fichier existe d&eacute;j&agrave; veuillez en trouver un autre ou le renommer !</span>";
			}
			
			$conn->Close();
			
		}
		else
		{
			echo "<span style='font-size:18px; color:red;'>Veuillez rentrer un nom de t&acirc;che et un type !</span>";
		}
		
		echo '<a class="back" href="cps_new_tache.php">Retour</a>';
	}
	else
	{
		header('Location: index.php');
	}
}
else
{
	header('Location: index.php');
}

?>