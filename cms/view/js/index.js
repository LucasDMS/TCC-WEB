$(document).ready(function(){

    var menu_aberto = true;

    $("#nav").on("click", function(){
        if(menu_aberto){
            $("#barra_lateral").animate({width:'toggle'},350, function(){
                // $("#itens_barra_lateral").fadeIn(250);
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

function toggleSubMenu(element, id, abrir) {

    var idElemento = 'sub_menu_' + id
    var idSeta = 'seta_' + id
    var sub_menu = '#' + idElemento
    var seta = '#' + idSeta

    if(abrir){
        $(seta).css('transform', 'rotate(90deg)')
        $(sub_menu).slideDown()
        // sub_menu.classList.add('sub_menu_visivel')
        element.setAttribute('onclick', 'toggleSubMenu(this,'+ id +', false)')
    }
    else{
        $(seta).css('transform', 'rotate(0)')
        $(sub_menu).slideUp()
        element.setAttribute('onclick', 'toggleSubMenu(this,'+ id +', true)')
    }
}