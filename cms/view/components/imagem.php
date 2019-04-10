<?php
function img($item){
    $imagem = null;
    $arquivo = $item['name'];
    $tamanho_arquivo = $item['size'];
    $tamanho_arquivo = round($tamanho_arquivo/20000);
    $ext_arquivo = strrchr($arquivo,".");
    $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);
    $nome_arquivo = md5(uniqid(time()).$nome_arquivo);
    $diretorio_arquivo = "arquivos/";
    $arquivos_permitidos = array(".jpg", ".png", ".jpeg");
    
    if(in_array($ext_arquivo, $arquivos_permitidos)){
        if($tamanho_arquivo<=2000){
            $arquivo_tmp = $_FILES['img']['tmp_name'];
            $imagem = $diretorio_arquivo . $nome_arquivo . $ext_arquivo;
        }
        move_uploaded_file($arquivo_tmp, $imagem);
    }
    return $imagem;
} 
?>
