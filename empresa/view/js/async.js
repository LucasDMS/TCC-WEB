const TYPE = { "ERROR" : 0, "SUCCESS" : 1, "ALERT" : 2 }

/**
 * 
 * @param {*} pagina 
 */
function chamarViewParaModal(pagina) {

    var url = formatarLink(pagina, "form");

    $.ajax({
        type: "GET",
        url: url,
        beforeSend: loader
    })
    .done(function (dados) {

        $("#modal").html(dados);
        modalToggle(true);
    });
}

/**
 * 
 * @param {*} pagina 
 */
function chamarViewParaApp(pagina) {

    var url = formatarLink(pagina, "listagem");
    sessionStorage.setItem('pagina', pagina)

    $.ajax({
        type: "GET",
        url: url,
        beforeSend: loader
    })
    .done(function (dados) {

        $("#app_content").html(dados);
    });
}

/**
 * 
 * @param {*} event 
 * @param {*} element 
 */
function asyncSubmit(event, element) {
    event.preventDefault();
    var url = element.getAttribute("action");
    var pagina = element.getAttribute("data-pagina");
    var formdata = new FormData(element);
    var modo = element.getAttribute("data-modo");
    var id = element.getAttribute("data-id");
    var idAutenticacao = element.getAttribute("data-idAutenticacao");
    var texto = element.getAttribute("data-texto");
    formdata.append("id", id);
    formdata.append("idAutenticacao", idAutenticacao);

    $.ajax({
        type: "POST",
        url: url,
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function (html) {
        recarregarLista(pagina);
        console.log(html);
        html = html.split('&')
        if(html[0]==="Usuário já existente!"){
            mostrarAlerta(html[0], TYPE.ERROR, 1000);
        }else{
            mostrarAlerta(html[0], TYPE.SUCCESS, 1000);
            modalToggle(false);
        }

    });
}

/**
 * 
 * @param {*} element 
 */
function asyncBuscarDados(element) {

    var url = element.getAttribute("data-url");
    var id = element.getAttribute("data-id");
    var pagina = element.getAttribute("data-pagina");

    var modo = element.getAttribute("data-modo");


    var formData = new FormData();
    
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function (dados) {
        $("#modal").html(dados);
        // reloadList(pagina);
        modalToggle(true);
    })
}

/**
 * 
 * @param {HTMLElement} elementoHTML Imagem de check-box
 */
function asyncAtivar(elementoHTML) {

    var url = elementoHTML.getAttribute("data-url");
    var id = elementoHTML.getAttribute("data-id");
    var pagina = elementoHTML.getAttribute("data-pagina");
    var ativo = elementoHTML.getAttribute("data-ativo");

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
    .done(function (dados) {

        recarregarLista(pagina);
    })
}

/**
 * 
 * @param {HTMLElement} elementoHTML Imagem de lixeira
 */
function asyncApagar(elementoHTML) {

    var url = elementoHTML.getAttribute("data-url");
    var id = elementoHTML.getAttribute("data-id");
    var pagina = elementoHTML.getAttribute("data-pagina");

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
    .done(function (dados) {

        recarregarLista(pagina);
    })
}

/**
 * Esta função, solicita novamente a lista, assim trazendo os dados atualizados
 * @param {string} pagina Nome da página com a tabela
 */
function recarregarLista(pagina) {

    var url = formatarLink(pagina, "listagem");

    $.ajax({
        type: "POST",
        url: url
    })
    .done(function (data) {

        $("#app_content").html(data);
    })
}

/**
 * Recebe o nome da página e o seu tipo e retorna o a url completa
 * 
 * Ex : "*view/noticias/noticias_listagem.php*"
 * @param {string} pagina Nome da página
 * @param {string} tipo Se é listagem ou form
 */
function formatarLink(pagina, tipo) {

    return "view/" + pagina + "/" + pagina + "_" + tipo + ".php";
}

/**
 * Troca o estado da modal, de fechado para aberto e vice-versa
 * @param {boolean} abrir Se é para abrir a modal ou não
 */
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

/**
 * AAA
 */
function loader(){
    console.log('loader');
}

$(".modal_saida").on("click", function () {
    modalToggle(false);
});

function mostrarAlerta(texto, tipo, duracao){

    var alertaDIV = $("#alerta")

    switch(tipo){
        case 0:
            alertaDIV.css( "background-color", "red" )
            break
        case 1:
            alertaDIV.css( "background-color", "green" )
            break
        case 2:
            alertaDIV.css( "background-color", "orange" )
            break
    }

    alertaDIV.html(texto)
    alertaDIV.fadeIn(350, function(){

        setTimeout(() => {
            alertaDIV.fadeOut(350)
        }, duracao);
        
    });
}