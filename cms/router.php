<?php 

$controller = null;
$modo = null;

if(isset($_GET['controller'])){

    $controller = strtoupper($_GET['controller']);
    $modo = strtoupper($_GET['modo']);

    switch($controller){
        case 'SESSAO':

            require_once('controller/ControllerSessao.php');

            $ControllerSessao = new ControllerSessao();

            switch($modo){
                case 'LOGAR':
                    $ControllerSessao->logar();
                    break;
            }

            break;

        case 'HISTORIA':

            require_once('controller/ControllerHistoria.php');
            
            $ControllerHistoria = new ControllerHistoria();

            switch($modo){
                case 'INSERIR':

                    $ControllerHistoria->inserirHistoria();
                    break;
                case 'ATUALIZAR':

                    $ControllerHistoria ->atualizarHistoria();
                    break;
                case 'EXCLUIR':

                    $ControllerHistoria->excluirHistoria();
                    break;
                case 'BUSCAR':

                    $Historia = $ControllerHistoria->buscarHistoriaPorId();
                    break;
                case 'ATIVAR':

                    $ControllerHistoria->ativarHistoria();
                    break;
            }
            break;
        

            case 'NOTICIAS':
            require_once('controller/controllerNoticia.php');
            $ControllerNoticia = new ControllerNoticia();
            switch($modo){
                case 'INSERIR':
                    //Chamando o metodo de inserir uma nova Noticia
                    $ControllerNoticia->inserirNoticia();
                    break;
                case 'ATUALIZAR':
                    $ControllerNoticia ->atualizarNoticia();
                    break;
                case 'EXCLUIR':
                    //Chamando o metodo de excluir uma Noticia
                    $ControllerNoticia->excluirNoticia();
                    break;
                case 'BUSCAR':   
                     $Noticia =$ControllerNoticia->buscarNoticiaPorId();
                    break;
                case 'ATIVAR':

                    $ControllerNoticia->ativarNoticia();
                    break;
            }
            break;


            case 'ESTABELECIMENTO':
            require_once('controller/controllerEstabelecimento.php');
            $ControllerEstabelecimento = new ControllerEstabelecimento();
            switch($modo){
                case 'INSERIR':
                    //Chamando o metodo de inserir um Novo Estabelecimento
                    $ControllerEstabelecimento->inserirEstabelecimento();
                    break;
                case 'ATUALIZAR':
                    $ControllerEstabelecimento ->atualizarEstabelecimento();
                    break;
                case 'EXCLUIR':
                    //Chamando o metodo de excluir um Estabelecimento
                    $ControllerEstabelecimento->excluirEstabelecimento();
                    break;
                case 'BUSCAR':
                     //Chamando o metodo de buscar um Estabelecimento
                     $Estabelecimento =$ControllerEstabelecimento->buscarEstabelecimentoPorId();
                    break;
                case 'ATIVAR':
                    //Chamando o metodo de Ativar o Estabelecimento
                    $ControllerEstabelecimento->ativarEstabelecimento();
                    break;
            }
            break;
            
             case 'PRODUTO_DESTAQUE':
            require_once('controller/controllerProduto_Destaque.php');
            $ControllerProduto_Destaque = new ControllerProduto_Destaque();
            switch($modo){
                case 'INSERIR':
                    //Chamando o metodo de inserir um Produto em Destaque
                    $ControllerProduto_Destaque->inserirProduto_Destaque();
                    break;
                case 'ATUALIZAR':
                    $ControllerProduto_Destaque ->atualizarProduto_Destaque();
                    break;
                case 'EXCLUIR':
                    //Chamando o metodo de excluir um Produto em Destaque
                    $ControllerProduto_Destaque->excluirProduto_Destaque();
                    break;
                case 'BUSCAR':
                     //Chamando o metodo de buscar um Produto em Destaque
                     $Produto_Destaque =$ControllerProduto_Destaque->buscarProduto_DestaquePorId();
                    break;
                case 'ATIVAR':
                    //Chamando o metodo de Ativar um Produto em Destaque
                    $ControllerProduto_Destaque->ativarProduto_Destaque();
                    break;
            }
            break;
            
             case 'SOBRE_NOS':

            require_once('controller/ControllerSobre_Nos.php');
            
            $ControllerSobre_Nos = new ControllerSobre_Nos();

            switch($modo){
                case 'INSERIR':

                    $ControllerSobre_Nos->inserirSobre_Nos();
                    break;
                case 'ATUALIZAR':

                    $ControllerSobre_Nos ->atualizarSobre_Nos();
                    break;
                case 'EXCLUIR':

                    $ControllerSobre_Nos->excluirSobre_Nos();
                    break;
                case 'BUSCAR':

                    $Sobre_Nos = $ControllerSobre_Nos->buscarSobre_NosPorId();
                    break;
                case 'ATIVAR':

                    $ControllerSobre_Nos->ativarSobre_Nos();
                    break;
            }
            break;
    }
}

?>