
function nova_input(){

    //input que será adicionado
    var input = "<div class='inputDados'><label from='txt_resposta'>Respostas</label><input type='text' name='txt_resposta[]' id='txt_resposta' required><br> </div>";
    //adicionando o input na div
    $('#novo').append( input ); 
    contador++;

}

function nova_input_setores(){

    //input que será adicionado
    var input = "<div class='inputDados'><label from='txt_prateleira'>Prateleira</label><input type='text' name='txt_prateleira[]' id='txt_prateleira' required><br></div><div class='inputDados'><label from='txt_capacidade'>Capacidade</label><input type='text' name='txt_capacidade[]' id='txt_capacidade' required><br></div>";
    //adicionando o input na div
    $('#novo_setores').append( input ); 
    contador++;

}