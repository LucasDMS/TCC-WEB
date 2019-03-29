$(document).ready(function(){

    var menu_aberto = true;

    $("#nav").on("click", function(){
        if(menu_aberto){
            $("#barra_lateral").animate({width:'toggle'},350, function(){
                $("#itens_barra_lateral").fadeIn(250);
            });
            menu_aberto = false;
        }
        else{
            $("#itens_barra_lateral").fadeOut(250,function(){
                $("#barra_lateral").animate({width:'toggle'},350);
            });
            menu_aberto = true;
        }
    });
});