
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

function asyncCall(event, pagina, operacao){
    event.preventDefault();

    if(operacao == "buscar_tudo"){

        url = formatarLink(pagina, "listagem");
    }
    else{
        
        var url = "router.php?controller=" + pagina + "&modo=" + operacao;
    }

    console.log(url);
        
    var formdata = new FormData(this);

    console.log(formdata);
    

    $.ajax({
        type: "POST",
        url: url,
        data: formdata,
        processData: false,
        contentType: false
    })
    .done(function(html){
        $("#app_content").html(html);
    });
}

function asyncSubmit(event, element){
    event.preventDefault()

    var url = element.getAttribute("action");
        
    $.ajax({
        type: "POST",
        url: url,
        data: new FormData($("#frm_historia")[0]),
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function(html){
        
    });
    
}


function asyncRequest(element){

    var url = element.getAttribute("data-url");
    var id  = element.getAttribute("data-id");

    $.ajax({
        type: "POST",
        url: url,
        data: { id_historia : id },
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function(data){
        console.log(data);
        
    })
}