 /* function validateForm()
		{
			document.getElementById("nom").innerHTML="";
			document.getElementById("prenom").innerHTML="";
			document.getElementById("email").innerHTML="";
			document.getElementById("identifiant").innerHTML="";
			document.getElementById("password").innerHTML="";
			document.getElementById("role").innerHTML="";

			var nom=document.forms["formulaire"]["nom_utilisateur"].value;
			var prenom=document.forms["formulaire"]["prenom_utilisateur"].value;
			var email=document.forms["formulaire"]["email_utilisateur"].value;
			var identifiant=document.forms["formulaire"]["identifiant_utilisateur"].value;
			var password=document.forms["formulaire"]["password_utilisateur"].value;
			var role=document.forms["formulaire"]["role_utilisateur"].value;
			if ((nom==null || nom=="")||(prenom==null || prenom=="")||(email==null || email=="")||(identifiant==null || identifiant=="")
			||(password==null || password=="")||(role=="0" || role>"5"))
			{
				if (nom==null || nom=="")
				{
					document.getElementById("nom").innerHTML="<img src='../style/img/warning_icon.png'/><font color=orange>Le champ doit &ecirc;tre rempli</font>";
				}
				if (prenom==null || prenom=="")
				{
					document.getElementById("prenom").innerHTML="<img src='../style/img/warning_icon.png'/><font color=orange>Le champ doit &ecirc;tre rempli</font>";
				}
				if (email==null || email=="")
				{
					document.getElementById("email").innerHTML="<img src='../style/img/warning_icon.png'/><font color=orange>Le champ doit &ecirc;tre rempli</font>";
				}
				if (identifiant==null || identifiant=="")
				{
					document.getElementById("identifiant").innerHTML="<img src='../style/img/warning_icon.png'/><font color=orange>Le champ doit &ecirc;tre rempli</font>";
				} 
				if (password==null || password=="")
				{
					document.getElementById("password").innerHTML="<img src='../style/img/warning_icon.png'/><font color=orange>Le champ doit &ecirc;tre rempli</font>";
				}
				if (role=="0" || role>"5")
				{
					document.getElementById("role").innerHTML="<img src='../style/img/warning_icon.png'/><font color=orange>Le r&ocirc;le n'existe pas</font>";
				}
				return false;
			} else {
				return true;
			}
		}
		
function verifPass()
{	
	var password=document.forms["formulaire"]["password_utilisateur"].value;
	var myRegex = new RegExp("^(?=.*[a-z]+)(?=.*[A-Z]+)(?=.*[0-9]+)([^\\s]{6,})$", "g");
	if (!myRegex.test(password))
	{
		document.getElementById("password").innerHTML="<img src='../style/img/warning_icon.png'/><font color=orange>Le mot de passe doit être composé d'une majuscule, d'un chiffre et 6 caract&egrave;res</font>";
		return false;
	} else {
		document.getElementById("password").innerHTML="";
		return true
	}
}
	
function verifMail()
{
	var email=document.forms["formulaire"]["email_utilisateur"].value;
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
	if (!reg.test(email))
	{
		document.getElementById("email").innerHTML="<img src='../style/img/warning_icon.png'/><font color=orange>Email invalide</font>";
		return false;
	} else {
		document.getElementById("password").innerHTML="";
		return true;
	}
}
		
function verifPseudo()
{
	var pseudo=document.forms["formulaire"]["identifiant_utilisateur"].value;
		if(pseudo != '')
		{
			if(texte = file('../models/m_users_verif.php?pseudo='+escape(pseudo)))
            {
            
				if(texte > "0")
				{
					document.getElementById('identifiant').innerHTML = "<font color=orange>Ce nom d'utilisateur existe d&eacute;j&agrave;</font>";
					return false;
				} else {
					document.getElementById('identifiant').innerHTML = "";
					return true;
				}
			}
		}
}

function file(fichier)
     {
     if(window.XMLHttpRequest) // FIREFOX
          xhr_object = new XMLHttpRequest(); 
     else if(window.ActiveXObject) // IE
          xhr_object = new ActiveXObject("Microsoft.XMLHTTP"); 
     else 
          return(false); 
     xhr_object.open("GET", fichier, false); 
     xhr_object.send(null); 
     if(xhr_object.readyState == 4) return(xhr_object.responseText);
     else return(false);
     }
     */
     /****** monkeys_list.php ******/
    
    function updateMonkey(id)
    {
          $("#typeModif").val('update');
          $('#id_singe').val(id);
          // alert( $('#id_singe').val());
          $('#actionForm').submit();
          
    }
    
    function deleteMonkey(id)
    {
        var validate=confirm("Voulez-vous supprimer ce pnh ?");
        var url="controlDataIndivMonkey.php";
         if(validate)
        {
            $("#typeModif").val('delete');
            $('#id_singe').val(id);
            
                
                var id_utilisateur=$('#id_singe').val();
                $.ajax({
                            type: "POST",
                            url: url,
                            data:"typeModif=delete&id_singe="+id,
                            success: function(data){
                                alert("Le pnh a été supprimé");
                                
                                window.location.reload();
                            }
                        });
        }
          
    }
        function recupInfosSinge()
        {
            var typeModif=$("#typeModif").val();
            var url="controlDataIndivMonkey.php";
            
            if(typeModif=="update")
            {
                
                var id_singe=$('#id_singe').val();
                $.ajax({
                            type: "POST",
                            url: url,
                            dataType:'script',
                            data:"typeModif=update&id_singe="+id_singe,
                            success: function(data){
                                eval(data);
                                
                                $('#typeModif').val('applyUpdate');
                            }
                        });
            }
            

        }
        
        
        
        function monkeyTreatment()
        {
            var typeModif=$('#typeModif').val();;
            var url="controlDataIndivMonkey.php";
            var arrayPost={};
            var result="Mise a jour effectuee";

            /* liste des attributs pour la création/modif d'un singe */
            var idSinge                 = $('#id_singe').val();
            var nomSinge                = $('#txtNom_singe').val();
            var dateNaissanceSinge      = $('#txtDateNaissance_singe').val();
            var lieuNaissanceSinge      = $('#txtLieuNaissance_singe').val();
            var groupeSinge             = $('#groupe_singe option:selected').val();
            var typeSinge               = $('#txtType_singe option:selected').val();
            var puceSingeGauche         = $('#txtPuce_singe_gauche').val();
            var puceSingeDroite         = $('#txtPuce_singe_droit').val();
            var descriptionSinge        = $('#txtDesc_singe').val();
            var sexeSinge               = $('input[name=radioButton_sex]:checked').val();

            // Contrôles des paramètres
            if (nomSinge.length == 0 || dateNaissanceSinge.length == 0 || groupeSinge.length == 0 || 
                typeSinge.length == 0 || puceSingeGauche.length == 0 || puceSingeDroite.length == 0 || descriptionSinge.length == 0 || sexeSinge.length == 0 || lieuNaissanceSinge.length == 0)
            {
                // Un ou plusieurs paramètres manquants

                alert("Attention : Vous devez renseigner tous les champs.");
            }
            else
            {   
                // Ready to go !

                if(typeModif=="insert")
                {  
                     result="pnh cree";
                }
             
                arrayPost['id_singe'] = idSinge;
                // arrayPost['role_utilisateur_courant']=$('#role_utilisateur_courant').val();
                arrayPost['nom_singe'] = nomSinge;
                arrayPost['dateNaissance_singe'] = dateNaissanceSinge;
                arrayPost['groupe_singe'] = groupeSinge;
                arrayPost['type_singe'] = typeSinge;
                arrayPost['puce_singe_droit'] = puceSingeDroite;
                arrayPost['puce_singe_gauche'] = puceSingeGauche;
                arrayPost['descriptif_singe'] = descriptionSinge;
                arrayPost['sexe_singe'] = sexeSinge;
                arrayPost['lieuNaissance_singe'] = lieuNaissanceSinge;
                

                arrayPost['typeModif']=$('#typeModif').val();
                $.ajax({
                                type: "POST",
                                url: url,
                                dataType:'script',
                                data:arrayPost,
                                success: function(data){
                                $('#etat').html(result);
                                 location.href='monkey_list.php';
                                }
                            });
            }

         
            
        }
        
        function recupMotDePasse(id)
        {
            var url='../controllers/c_users.php';
            $.ajax({
                            type: "POST",
                            url: url,
                            data:'instruction=resetPassword&id='+id,
                            success: function(data){
                                $('#password').html('Mot de passe regenere. Un email a été envoye a l\'adresse spécifiée.');
                            }
                        });
        }
     
        function getAllBatteries()
        {
            var url='controlDataGroupesAndBatteries.php';
            var groupeId=$('#groupes option:selected').val();
            $.ajax({
                            type: "POST",
                            url: url,
                            dataType:'script',
                            data:'instruction=getAllBatteries&groupeId='+groupeId,
                            success: function(data){
                              
                            }
                        });
        }
        
        function getAllGroupes()
        {
            var url='controlDataGroupesAndBatteries.php';
            $.ajax({
                            type: "POST",
                            url: url,
                            dataType:'script',
                            data:'instruction=getAllGroupes',
                            success: function(data){
                              
                            }
                        });
        }
        
        function changeGroupeBatterie()
        {
            var url='controlDataGroupesAndBatteries.php';
            var batterieId=$('#batterie_groupe_selected option:selected').val();
            var groupeId=$('#groupes option:selected').val();
            // alert('id batterie : '+batterieId);
            // alert('groupeId : '+groupeId);
            $.ajax({
                            type: "POST",
                            url: url,
                            data:'instruction=changeBatterieGroupe&batterieId='+batterieId+"&groupeId="+groupeId,
                            success: function(data){
                              // alert(data);
							  
							  $('#resultat').html('Batterie affectée');
							  
							  window.location.reload();
							  
                            }
                        });
        }

    function getAllGroupesOnCreate()
    {
        var url='controlDataIndivMonkey.php';
        $.ajax({
                    type: "POST",
                    url: url,
                    dataType:'script',
                    data:'instruction=getAllGroupes&instructionType=getAllTypes',
                    success: function(data){
                      
                    }
                });
    }
	
	function getAllTypesOnCreate()
    {
		alert("coco");
        var url='controlDataIndivMonkey.php';
        $.ajax({
                    type: "POST",
                    url: url,
                    dataType:'script',
                    data:'instructionType=getAllTypes',
                    success: function(data){
                      
                    }
                });
    }
        
        function changeGroupe()
        {
            
        }
     