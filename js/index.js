var menu_esquerda = false;
var menu_direita  = false;

function abrirMenu(menu){

    if(menu == "esquerda"){

        $(".menu_esquerda");
    }
    else if(menu === "direita"){
        
        $(".menu_direita");
    }
}



var menu_ativo = false;
$(".click_trigger").click(toggleMenu);

function toggleMenu(){

    if(menu_ativo){

        $(".sub_menu").toggle("slide");
        menu_ativo = false;
    }
    else{

        $(".sub_menu").toggle("slide");

        menu_ativo = true;
    }   
}

var chat_ativo = false;
$("#btn_chat").click(function(){

    if (chat_ativo){

        $(".btn_chat_bot").css({
            height: 48,
            width: 48
        })
    
        $("#btn_chat").addClass("fa-comment");
        $("#btn_chat").removeClass("fa-comment-slash");

        chat_ativo = false;
        
        mostrarChat(chat_ativo);
    }
    else{
        
        $(".btn_chat_bot").css({
            height: 400,
            width: 250
        })
    
        $("#btn_chat").removeClass("fa-comment");
        $("#btn_chat").addClass("fa-comment-slash");

        setTimeout(function(){
            mostrarChat(chat_ativo);
        },150);

        chat_ativo = true;
    }
})

$("#form_chat_bot").submit(function(event){
    event.preventDefault();

    var mensagem = $("#txt_chat").val();

    $("#txt_chat").val("")

    $(".chat_messages").html(mensagem);

    console.log('mensagem do chat : ' + mensagem);
    
})

/**
 * 
 * @param {boolean} ativo SE O CHAT ESTIVER ATIVO MOSTRE
 */
function mostrarChat(ativo){
    
    if(!ativo){
        $(".chat_container").fadeOut(0)
        
    }
    else{
        $(".chat_container").fadeIn(200)
    }
}

function request(element){

    var url = element.dataset.url;

    $.ajax({
        type: "GET",
        url: url
    })
    .done(function(dados){

        toggleMenu();
        $("#app").html(dados);
    });
}