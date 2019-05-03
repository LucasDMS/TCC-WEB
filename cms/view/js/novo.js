
function nova_input(){

    //input que será adicionado
    var input = "<div class='inputDados'> <input type='text' name='txt_resposta[]' id='txt_resposta' placeholder='Resposta' required><br> </div>";
    //adicionando o input na div
    $('#novo').append( input ); 
    contador++;

}

function nova_input_setores(){

    //input que será adicionado
    var input = "<div class='inputDados'> <input type='text' name='txt_prateleira[]' id='txt_prateleira' placeholder='Prateleira' required><br></div><div class='inputDados'><input type='text' name='txt_capacidade[]' id='txt_capacidade' placeholder='Capacidade' required><br></div>";
    //adicionando o input na div
    $('#novo_setores').append( input ); 
    contador++;

}