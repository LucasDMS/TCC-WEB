
$(".modal_saida").on("click", function(){
    modalToggle(false);
});


function callView(pagina){
   
    var url = formatarLink(pagina, 'listagem');

    $.ajax({
        type: "GET",
        url: url,
        beforeSend: function(){
            console.log('colocar loader aq');
            
        }
    })
    .done(function(dados){

        $("#app_content").html(dados);
    });
}

function buscarForm(pagina){

    var url = formatarLink(pagina, "form");

    $.ajax({
        type: "GET",
        url: url,
        beforeSend: function(){
            console.log('colocar loader aq');
            
        }
    })
    .done(function(dados){

        $("#modal").html(dados);

        modalToggle(true);
    });    
}

function formatarLink(pagina, tipo){

    return "view/" + pagina + "/" + pagina + "_" + tipo + ".html";
}


function modalToggle(abrir){

    if(abrir){
        $(".modal_bg").fadeIn();
    }
    else{
        $(".modal_bg").fadeOut();
    }
}