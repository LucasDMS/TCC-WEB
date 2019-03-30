
function callView(pagina, output, callback){
   
    var url = formatarLink(pagina, 'listagem');

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

    if(callback !== undefined){
        callback()
    }
}

function funlegal(){
    console.log('vim do callback');
    
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

$(".modal_saida").on("click", function(){
    modalToggle(false);
});