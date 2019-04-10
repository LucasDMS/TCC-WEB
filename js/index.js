var menu_esquerda_ativo = false;
var menu_direita_ativo  = false;

/**
 * 
 * Parametro vem como *.menu_esquerda* ou *.menu_direita* 
 */
function abrirMenu(menu){

    if(menu == ".menu_esquerda"){

        if(menu_esquerda_ativo){

            $(menu).animate({width:0});
            menu_esquerda_ativo = false;
        }
        else{

            $(menu).animate({width:350});
            menu_esquerda_ativo = true;
        }
    }
    else if(menu === ".menu_direita"){

        if(menu_direita_ativo){

            $(menu).animate({width:0});
            menu_direita_ativo = false;
        }
        else{

            $(menu).animate({width:350});
            menu_direita_ativo = true;
        }
    }
}

$(document).ready(function(){
    $("#header").css("box-shadow", "none")
})

$(window).scroll(function(event){
    
    var pos = $(window).scrollTop()

    if(pos <= 900){
        $("#header").css("box-shadow", "none")
    }
    else{
        $("#header").css("box-shadow", " 0 0 5px 1px #363a3e")
    }
})



function abrirLogin(){

    setTimeout(function(){

        $.ajax({
            url: "components/cadastro.php"
        })
        .done(function(html){

            $(".menu_direita_container").html(html);
        })

    }, 500);
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

function request(event, element){
    event.preventDefault();

    var url = element.href;

    $.ajax({
        type: "GET",
        url: url,
        beforeSend: function(){
            console.log('colocar loader aq');
            
        }
    })
    .done(function(dados){

        toggleMenu();
        $("#app").html(dados);
    });
}