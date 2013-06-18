function recupData()
{
    $.ajax({
        url: "./retrieveData.php",
        success: function(data){
    $("#type_list").append(data);
        }
    });
}