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

function abrirLogin(){

    setTimeout(function(){

        $.ajax({
            url: "components/login.php"
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
function asyncSubmit(event, element) {
    event.preventDefault();
    var url = element.getAttribute("action");
    var pagina = element.getAttribute("data-pagina");
    var formdata = new FormData(element);
    $.ajax({
        type: "POST",
        url: url,
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function (html) {
        window.location.reload();
    });
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

function chamarViewParaModal(pagina, abrirModal) {

    var url = 'components/' + pagina + '.php'

    $.ajax({
        type: "GET",
        url: url
    })
    .done(function (dados) {

        $("#modal").html(dados);

        if(abrirModal){
            modalToggle(true);
        }
    });
}

function modalToggle(abrir) {

    if (abrir) {
        $(".modal_bg")
            .css("display", "flex")
            .hide()
            .fadeIn()
    }
    else {
        $(".modal_bg").fadeOut();
    }
}

$(".modal_saida").on("click", function () {
    modalToggle(false);
});


/**
 * 
 * @param {*} event 
 * @param {*} element 
 */
function asyncParticipar(event, element) {
    event.preventDefault();
    var url = element.getAttribute("action");
    var pagina = element.getAttribute("data-pagina");
    var formdata = new FormData(element);
    var modo = element.getAttribute("data-modo");
    var id = element.getAttribute("data-id");
    var idPromocao = element.getAttribute("data-id-promocao");

    formdata.append("id", id);
    formdata.append("idPromocao", idPromocao);

    $.ajax({
        type: "POST",
        url: url,
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function (html) {
        
        location.reload();
    });
}
