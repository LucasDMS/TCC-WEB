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
                     $Estabelecimento =$ControllerEstabelecimento->buscarEstabelecimentoPorId();
                    break;
                case 'ATIVAR':
                    
                    $ControllerEstabelecimento->ativarEstabelecimento();
                    break;
            }
            break;
    }
}

?>