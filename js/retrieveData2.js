function recupData2(id,format,query)
{
    $.ajax({
    type: "POST",
        url: "./php/controlerFormatQueryResults.php",
        data:"format="+format+"&query="+query, /* query corresponding to the php variable : $queryName*/
        success: function(data){
            $(id).html(data);
        }
    });
	
	
	
	
	
	
	var taille = $('#object').length;
	var select = document.getElementById('object');
	var span = document.getElementById('resultat');
	
	
}