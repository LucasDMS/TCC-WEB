
function callView(pagina, tipo){

    var ext = ".html";

    var url = "view/" + pagina + "/" + pagina + "_" + tipo + ext;

    console.log(url);
    

    $.ajax({
        type: "GET",
        url: url,
        beforeSend: function(){
            console.log('colocar loader aq');
            
        }
    })
    .done(function(dados){

        $("#app").html(dados);
    });
}