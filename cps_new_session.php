<?php session_start();

	if(isset($_SESSION["connecte"]))
	{
		if($_SESSION["connecte"] == "ok")
		{
			include('head.php');
			include('c_sessions_types_list.php');	
?>

<div id="main">
		<h2 class="title">Cr&eacute;ation d'une session</h2>
		<hr id="under-title"/>
		
			<div class="box">
				<form id ="formSessionType" method="post" onsubmit="return formSessionTypeSubmit();">
					<label for="inputTextSessionName">Nom de la session : </label><input style="margin-left:22px;" id="inputTextSessionName" type="text" name="sessionName"></br></br>
					<label style="display:block; float:left; margin-right:130px;" >Liste des sessions types</label><label for="selectSessionType">Liste des t&acirc;ches de la session type</label></br>
					<!-- <select id="selectSessionType" name="selectSessionType"></select> -->
					<?php echo getSessionsTypesList(); ?>
					<div style="display:block; float:left; margin-top:40px;">
						<input style=" margin-left:55px; margin-bottom:15px; display:block; float:left;" type="button" value="M&eacute;langer" onclick="shuffleSelect();" />
						<input style="margin-left:20px; margin-bottom:15px;  margin-right:10px;display:block;" type="button" onclick="listbox_move('selectSessionsTypesTasks', 'up')" value="D&eacute;placer vers le haut" />
						<input style="margin-left:21px; margin-right:10px; display:block;" type="button" onclick="listbox_move('selectSessionsTypesTasks', 'down')" value="D&eacute;placer vers le bas" />
					</div>
					<select style="display:block; margin-top:20px; margin-left:10px;float:left; min-width:150px;" id="selectSessionsTypesTasks" name="selectSessionsTypesTasks" size="10"></select>
					<input style="display:block; clear:both; margin-left:220px; margin-top:200px;" type='submit' value='Valider' onclick='' />
				</form>	
			</div>

			<a class="back" href="main_page.php">Retour</a>
	
<script type="text/javaScript" src="js/admin_js.js"></script>
<script>

	$('#selectSessionType').change(function() {
		//alert(this.value);

		myCall();

	});

	function myCall() {
        var request = $.ajax({
            url: "c_sessions_types_tasks_list.php",
            type: "POST",            
            dataType: "html",
            data: "val="+$("#selectSessionType").val()
        });
 
        request.done(function(msg) {
            $('#selectSessionsTypesTasks').html(msg);          
        });
 
        request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
        });
    }

	function shuffleSelect()
	{
		$('#selectSessionsTypesTasks').shuffle();
	}

	(function($){

		$.fn.shuffle = function() {
			return this.each(function(){
			var items = $(this).children().clone(true);
			return (items.length) ? $(this).html($.shuffle(items)) : this;
			});
		}

		$.shuffle = function(arr) {
			for(var j, x, i = arr.length; i; j = parseInt(Math.random() * i), x = arr[--i], arr[i] = arr[j], arr[j] = x);
			return arr;
		}
    
	})(jQuery)

	function formSessionTypeSubmit() 
	{
		/*
		var options = $('#selectSessionsTypesTasks option');

		var formSessionType = $('formSessionType');

		formSessionType.setAttribute("type","hidden");
		formSessionType.setAttribute("name","action");
		formSessionType.setAttribute("value",action);

		var values = $.map(options ,function(option) {
			alert(option.value);

		});*/

     	var options = $('#selectSessionsTypesTasks option');
     	var tabVal = $.map(options ,function(option) {
			//alert(option.value);

			return option.value;

		});

     	var url='c_sessions.php';
	      $.ajax({
					 type: "POST",
					 url: url,
					 data:'tabSelect='+tabVal+'&sessionName='+$('#inputTextSessionName').val()+'&sessionTypeId='+$('#selectSessionType option:selected').val(),
					 success: function(data){
					   $('#inputTextSessionName').val("");
					   $('#selectSessionsTypesTasks').empty();
					   alert('Session cree avec succes !');
					 }
				 });

	      return false;
	}

	function listbox_move(listID,direction){
		var listbox=document.getElementById(listID);var selIndex=listbox.selectedIndex;if(-1==selIndex){alert("Please select an option to move.");return;}
var increment=-1;if(direction=='up')
increment=-1;else
increment=1;if((selIndex+increment)<0||(selIndex+increment)>(listbox.options.length-1)){return;}
var selValue=listbox.options[selIndex].value;var selText=listbox.options[selIndex].text;listbox.options[selIndex].value=listbox.options[selIndex+increment].value
listbox.options[selIndex].text=listbox.options[selIndex+increment].text
listbox.options[selIndex+increment].value=selValue;listbox.options[selIndex+increment].text=selText;listbox.selectedIndex=selIndex+increment;}

function listbox_moveacross(sourceID,destID){
	var src=document.getElementById(sourceID);var dest=document.getElementById(destID);for(var count=0;count<src.options.length;count++){if(src.options[count].selected==true){var option=src.options[count];var newOption=document.createElement("option");newOption.value=option.value;newOption.text=option.text;newOption.selected=true;try{dest.add(newOption,null);src.remove(count,null);}catch(error){dest.add(newOption);src.remove(count);}
count--;}}}

function listbox_selectall(listID,isSelect){
	var listbox=document.getElementById(listID);for(var count=0;count<listbox.options.length;count++){listbox.options[count].selected=isSelect;}}


</script>

<?php			
		
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