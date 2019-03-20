var menu_ativo = false;
$(".click_trigger").click(function(){

    if(menu_ativo){

        $(".sub_menu").slideUp(200, function(){
            $(".redes_socias").fadeIn(5);
        });
        
        menu_ativo = false;
    }
    else{

        $(".redes_socias").fadeOut(5, function(){
            $(".sub_menu").slideDown(200);
        });

        menu_ativo = true;
    }   
});

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