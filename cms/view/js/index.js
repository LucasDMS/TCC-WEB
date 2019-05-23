var pagina = ''

$(document).ready(function(){
    //recebe a pagina que estava salva na sessao
    // pagina = sessionStorage.getItem('pagina')

    // chamarViewParaApp(pagina);
});

var estado = false
function toggleMenu(){

    if(estado){
        $("#barra_lateral").animate({width:'toggle'},350, function(){
            // $("#itens_barra_lateral").fadeIn(250);
        });
        estado = false
    }
    else{
        $("#barra_lateral").animate({width:'toggle'},350);
        // $("#itens_barra_lateral").fadeOut(250,function(){});
        estado = true
    }
}

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