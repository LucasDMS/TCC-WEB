var contador = 1;

function nova_input(){
    
    if(contador <= 3){
        //input que será adicionado
        var input = "<div class='inputDados'> <input type='text' name='txt_resposta[]' id='txt_resposta' placeholder='Resposta' required><br> </div>";
        //adicionando o input na div
        $('#novo').append( input ); 
        contador++;
    }else{
        alert("Apenas 5 resposta pode ser adicionadas");
    }


}