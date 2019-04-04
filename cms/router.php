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
            case 'FALE_CONOSCO':
            require_once('controller/controllerFaleConosco.php');
            $ControllerFaleConosco = new ControllerFaleConosco();
            switch($modo){
                case 'INSERIR':
                    //Chamando o metodo de inserir uma nova FaleConosco
                    $ControllerFaleConosco->inserirFaleConosco();
                    break;
                case 'ATUALIZAR':
                    $ControllerFaleConosco ->atualizarFaleConosco();
                    break;
                case 'EXCLUIR':
                    //Chamando o metodo de excluir uma FaleConosco
                    $ControllerFaleConosco->excluirFaleConosco();
                    break;
                case 'BUSCAR':   
                     $FaleConosco =$ControllerFaleConosco->buscarFaleConoscoPorId();
                    break;
                case 'ATIVAR':

                    $ControllerFaleConosco->ativarFaleConosco();
                    break;
            }
            break;
            case 'SUSTENTABILIDADE':
            require_once('controller/ControllerSustentabilidade.php');
            $ControllerSustentabilidade = new ControllerSustentabilidade();
            switch($modo){
                case 'INSERIR':
                    //Chamando o metodo de inserir uma nova Sustentabilidade
                    $ControllerSustentabilidade->inserirSustentabilidade();
                    
                    break;
                case 'ATUALIZAR':
                    $ControllerSustentabilidade ->atualizarSustentabilidade();
                    break;
                case 'EXCLUIR':
                    //Chamando o metodo de excluir uma Sustentabilidade
                    $ControllerSustentabilidade->excluirSustentabilidade();
                    break;
                case 'BUSCAR':   
                     $Sustentabilidade =$ControllerSustentabilidade->buscarSustentabilidadePorId();
                    break;
                case 'ATIVAR':

                    $ControllerSustentabilidade->ativarSustentabilidade();
                    break;
            }
            break;
    }
}

?>