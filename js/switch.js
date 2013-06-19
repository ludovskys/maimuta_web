function switchPlace(direction)
{
    if(direction == "toRight")
    {
        $('#rightTasks').append($('<option>', { 
            value: $("#leftTasks option:selected").val(),
            text : $("#leftTasks option:selected").text()
        }));
    }
    else if(direction =='toLeft')
    {
       /* $('#left').append($('<option>', { 
            value: $("#right").val(),
            text : $("#right option:selected").text()
        }));*/
        $('#rightTasks option:selected').remove();
    }

}

function envoiSession()
{
   var values=$.map($('#rightTasks option'), function(e) { return e.value; });
    $.ajax({
        url: "./insertSession.php",
        type: "post",
        data: "tab="+values,
        success: function(data){
        
            var styleVar = 'visibility:show; margin-left:270px; margin-top:15px;';
        
            $('#res').attr('style',styleVar);
        }
    });
    
}

function envoiPalier()
{
    var values=$.map($('#rightTasks option'), function(e) { return e.value; });
    var nom_palier=$('#txtNomPalier').val();

    // Si aucun nom n'est donné
    if (nom_palier.length == 0)
    {
        alert("Attention : Vous devez donner un nom à votre palier");
    }
    // Si aucune session n'a été sélectionné pour le palier
    else if (values.length == 0)
    {
        alert("Attention : Votre palier ne contient aucune session");
    }
    // Sinon, on peut y aller
    else
    {
         //alert("Ready to go!");

        $.ajax({
                url: "./insertPalier.php",
                type: "post",
                data: "tab="+values+"&nom_palier="+nom_palier,
                success: function(data)
                {
                    var styleVar = 'visibility:show; margin-left:270px; margin-top:15px;';

                    $('#res').attr('style',styleVar);

                    $('#txtNomPalier').val('');
                    $('#rightTasks').empty();
                }
            });
    }

    
    
}

function envoiBatterie()
{
   var values=$.map($('#rightTasks option'), function(e) { return e.value; });
    var nom_batterie=$('#txtNomBatterie').val();

    // Si aucun nom n'est donné
    if (nom_batterie.length == 0)
    {
        alert("Attention : Vous devez donner un nom à votre batteire");
    }
    // Si aucune session n'a été sélectionné pour le palier
    else if (values.length == 0)
    {
        alert("Attention : Votre batterie ne contient aucune palier");
    }
    else
    {
        $.ajax({
            url: "./insertBatterie.php",
            type: "post",
            data: "tab="+values+"&nom_batterie="+nom_batterie,
            success: function(data){

                var styleVar = 'visibility:show; margin-left:270px; margin-top:15px;';

                $('#res').attr('style',styleVar);
                alert(data);
                $('#txtNomBatterie').val('');
                $('#rightTasks').empty();
            }
        });
    }
    
    
}


function reset()
{
    var defaultRight=" ";
            
    $('#rightTasks').html(defaultRight);
    
    var styleVar = 'visibility:hidden; margin-left:270px; margin-top:15px;';

    $('#res').attr('style',styleVar);
    
}

