$(".modal_saida").on("click", function(){
    modalToggle(false);
});

function callView(pagina, tipo){
   
    var url = formatarLink(pagina, tipo);

    $.ajax({
        type: "GET",
        url: url,
        beforeSend: function(){
            console.log('colocar loader aq');
        }
    })
    .done(function(dados){

        if(tipo === "listagem"){

            $("#app_content").html(dados);
        }
        else{

            $("#modal").html(dados);

            modalToggle(true);
        }
    });
}

function asyncSubmit(event, element){
    event.preventDefault()

    var url = element.getAttribute("action");
    var pagina = element.getAttribute("data-pagina");
    var modo = element.getAttribute("data-modo");
    var id = element.getAttribute("data-id");

    var formdata = new FormData(element);
    formdata.append("id", id);
    
    $.ajax({
        type: "POST",
        url: url,
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function(html){

        reloadList(pagina);
        modalToggle(false);
    });
}

function asyncRequest(element){

    var url = element.getAttribute("data-url");
    var id  = element.getAttribute("data-id");
    var pagina = element.getAttribute("data-pagina");

    var modo = element.getAttribute("data-modo");
   
    var formData = new FormData();

    if(modo == 'inserir'){

        formData.append("id_historia", id);
    }
    else if(modo == 'atualizar'){

        formData.append("id_historia", id);
    }
    
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function(dados){
        
        $("#modal").html(dados);
        // reloadList(pagina);
        modalToggle(true);
    })
}

function asyncAtivate(element){

    var url = element.getAttribute("data-url");
    var id  = element.getAttribute("data-id");
    var pagina = element.getAttribute("data-pagina");
    var ativo = element.getAttribute("data-ativo");
   
    var formData = new FormData();

    formData.append("id", id);
    formData.append("ativo", ativo);
    
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function(dados){
        
        reloadList(pagina);
    })
}

function asyncDelete(element){

    var url = element.getAttribute("data-url");
    var id  = element.getAttribute("data-id");
    var pagina = element.getAttribute("data-pagina");
   
    var formData = new FormData();

    formData.append("id", id);
    
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function(dados){
        
        reloadList(pagina);
    })
}


function reloadList(pagina){

    var url = formatarLink(pagina, "listagem");

    $.ajax({
        type: "POST",
        url: url
    })
    .done(function(data){
        
        $("#app_content").html(data);
    })
}



/**
 * UTILS
 */
function formatarLink(pagina, tipo){

    return "view/" + pagina + "/" + pagina + "_" + tipo + ".php";
}

function modalToggle(abrir){

    if(abrir){
        $(".modal_bg")
            .css("display", "flex")
            .hide()
            .fadeIn()
    }
    else{
        $(".modal_bg").fadeOut();
    }
}