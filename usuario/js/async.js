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