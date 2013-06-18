<?php session_start();
	
	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include('head.php');
			
?>
	
    <form id='formEdit' method='POST' action="<?php if($_GET['type'] == "tache"){$cible = "param";}else{$cible=$_GET['type'];} echo "".$cible.""; ?>.php">
        <select id="object" size="12">
            
        </select>
		<span id="resultat" style="display:none">Il n'y aucun element dans le liste !</span>
        <input type='hidden' name='type' value=<?php echo "'".$_GET['type']."'"; ?>/>
        <input type='hidden' id='objectName' name='name' value='' />
        <input type='hidden' id='objectId' name='id' value='' />
        <input type='hidden' id='objectType' name='type_tache' value='' />
    </form>
        <input type='button' onclick='submitForm()' value='Edit' style="float:left; margin-top:-25px; margin-left:230px;"/>
    

<?php			
			echo '<a class="back" href="main_page.php">Retour</a>';
		
			include("foot.php");
			
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

<script src='js/jquery-1.9.1.js'></script>
<script src='js/retrieveData2.js'></script>
<script type='text/javascript'>
  
    $(document).ready(function(){
        recupData2('#object','liste','all_'+<?php echo "'".$_GET['type']."'"; ?>+'_query');
    });
    
    function submitForm()
    {
        var objectName=$('#object option:selected').text();
         $('#objectName').val(objectName);  
         
         var objectId=$('#object option:selected').val();
         $('#objectId').val(objectId);  
         
		 //recupData2('#objectType','single','');
		
		$.ajax({
		type: "POST",
			url: "./php/recupSessionType.php",
			data:"id="+objectId,
			success: function(data){
				$('#objectType').val(data);
				$('#formEdit').submit(); 
			}
		});
         
    }
    
    
</script>