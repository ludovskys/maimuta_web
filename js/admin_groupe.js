/****** groupes_list.php ******/
    
function updateGroupe(id)
{
	  $("#typeModif").val('update');
	  $('#id_groupe').val(id);
	  // alert( $('#id_groupe').val());
	  $('#actionForm').submit();
	  
}

function deleteGroupe(id)
{
	var validate=confirm("Voulez-vous supprimer ce groupe ?");
	var url="controlDataIndivGroupe.php";
	 if(validate)
	{
		$("#typeModif").val('delete');
		$('#id_groupe').val(id);
		
			
			var id_utilisateur=$('#id_groupe').val();
			$.ajax({
						type: "POST",
						url: url,
						data:"typeModif=delete&id_groupe="+id,
						success: function(data){
						
							alert("Le groupe a été supprimé");
							
							window.location.reload();
						}
					});
	}
	  
}
	
function recupInfosGroupe()
{
	var typeModif=$("#typeModif").val();
	var url="controlDataIndivGroupe.php";
	
	if(typeModif=="update")
	{
		
		var id_groupe=$('#id_groupe').val();
		$.ajax({
					type: "POST",
					url: url,
					dataType:'script',
					data:"typeModif=update&id_groupe="+id_groupe,
					success: function(data){
						eval(data);
						
						$('#typeModif').val('applyUpdate');
					}
				});
	}
	

}
        
        
        
 function groupeTreatment()
{
	// Paramètres de création d'un groupe
	var nomGroupe = $('#txtNom_groupe').val();
	var descriptionGroupe = $('#txtDescription_groupe').val();

	// Si un des 2 champs est vide
	if (nomGroupe.length == 0 | descriptionGroupe.length == 0)
	{
		alert("Attention : Vous devez renseigner tous les champs.");
	}
	else
	{
		// Ready to go

		var typeModif=$('#typeModif').val();;
		var url="controlDataIndivGroupe.php";
		var arrayPost={};
		var result="Mise a jour effectuee";
	 
		if(typeModif=="insert")
		{
			
			 result="groupe cree";
		}
	 
		arrayPost['id_groupe']=$('#id_groupe').val();
		// arrayPost['role_utilisateur_courant']=$('#role_utilisateur_courant').val();
		arrayPost['nom_groupe']=nomGroupe;
		arrayPost['description_groupe']=$('#txtDescription_groupe').val();
		
		
		
		arrayPost['typeModif']=$('#typeModif').val();
		$.ajax({
						type: "POST",
						url: url,
						dataType:'script',
						data:arrayPost,
						success: function(data){
						$('#etat').html(result);
						 location.href='groupe_list.php';
						}
					});
		}

}