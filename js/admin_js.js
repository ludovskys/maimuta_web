  function validateForm()
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
     
     /****** v_users_list.php ******/
    
    function updateUser(id)
    {
          $("#typeModif").val('update');
          $('#id_utilisateur').val(id);
          $('#actionForm').submit();
          
    }
    
    function deleteUser(id)
    {
        var validate=confirm("Voulez-vous supprimer l'utilisateur ?");
        var url="../controllers/c_users.php";
         if(validate)
        {
            $("#typeModif").val('delete');
            $('#id_utilisateur').val(id);
            
                
                var id_utilisateur=$('#id_utilisateur').val();
                $.ajax({
                            type: "POST",
                            url: url,
                            data:"typeModif=delete&id_utilisateur="+id,
                            success: function(data){
                                alert("L'utilisateur a été supprimé");
                                
                                window.location.reload();
                            }
                        });
        }
          
    }
        function recupInfos()
        {
            var typeModif=$("#typeModif").val();
            var url="../controllers/c_users.php";
            
            if(typeModif=="update")
            {
                
                var id_utilisateur=$('#id_utilisateur').val();
                $.ajax({
                            type: "POST",
                            url: url,
                            dataType:'script',
                            data:"typeModif=update&id_utilisateur="+id_utilisateur,
                            success: function(data){
                                eval(data);
                                
                                $('#typeModif').val('applyUpdate');
                            }
                        });
            }
            else
            {
                 $.ajax({
                            type: "POST",
                            url: url,
                            dataType:'script',
                            data:"instruction=recupRole",
                            success: function(data){
                                eval(data);
                            }
                        });
            }

        }
        
        
        
        function userTreatment()
        {
            var typeModif=$('#typeModif').val();;
            var url="../controllers/c_users.php";
            var arrayPost={};
            var result="Mise a jour effectuee";
         
         if(typeModif=="insert")
            {
                 arrayPost['password_utilisateur']=$('#txtPassword_utilisateur').val();
                 result="Utilisateur cree";
            }
         
            arrayPost['id_utilisateur']=$('#id_utilisateur').val();
            arrayPost['role_utilisateur_courant']=$('#role_utilisateur_courant').val();
            arrayPost['nom_utilisateur']=$('#txtNom_utilisateur').val();
            arrayPost['prenom_utilisateur']=$('#txtPrenom_utilisateur').val();
            arrayPost['email_utilisateur']=$('#txtEmail_utilisateur').val();
            arrayPost['identifiant_utilisateur']=$('#txtIdentifiant_utilisateur').val();
            arrayPost['role_utilisateur']=$('#select_user_role option:selected').val();
            arrayPost['organisme_utilisateur']=$('#txtOrganisme_utilisateur').val();
            arrayPost['typeModif']=$('#typeModif').val();
            $.ajax({
                            type: "POST",
                            url: url,
                            dataType:'script',
                            data:arrayPost,
                            success: function(data){
                            $('#etat').html(result);
                            location.href='../views/v_users_list.php';
                            }
                        });
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
     
        
     