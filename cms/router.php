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
        
        case 'EVENTOS':
            require_once('controller/controllerEventos.php');
            $ControllerEventos = new ControllerEventos();
            switch($modo){
                case 'INSERIR':
                    $ControllerEventos->inserirEventos();
                    break;
                case 'ATUALIZAR':
                    $ControllerEventos->atualizarEventos();
                    break;
                case 'EXCLUIR':
                    $ControllerEventos->excluirEventos();
                    break;
                case 'BUSCAR':

                case 'ATIVAR':
                    $ControllerEventos->ativarEventos();
                    break;
            }
            break;

        case 'VIDEOS':
            require_once('controller/controllerVideos.php');
            $ControllerVideos = new ControllerVideos();
            switch($modo){
                case 'INSERIR':
                    $ControllerVideos->inserirVideos();
                    break;
                case 'ATUALIZAR':
                    $ControllerVideos->atualizarVideos();
                    break;
                case 'EXCLUIR':
                    $ControllerVideos->excluirVideos();
                    break;
                case 'ATIVAR':
                    $ControllerVideos->ativarVideos();
                    break;
            }
            break;

        case 'PATROCINIO':
            require_once('controller/controllerPatrocinio.php');
            $ControllerPatrocinio = new ControllerPatrocinio();
            switch($modo){
                case 'INSERIR':
                    $ControllerPatrocinio->inserirPatrocinio();
                    break;
                case 'ATUALIZAR':
                    $ControllerPatrocinio->atualizarPatrocinio();
                    break;
                case 'EXCLUIR':
                    $ControllerPatrocinio->excluirPatrocinio();
                    break;
                case 'ATIVAR':
                    $ControllerPatrocinio->ativarPatrocinio();
                    break;
            }
            break;

        case 'PRINCIPAL_EVENTOS':
            require_once('controller/controllerPrincipalEventos.php');
            $ControllerPrincipalEventos = new ControllerPrincipalEventos();
            switch($modo){
                case 'INSERIR':
                    $ControllerPrincipalEventos->inserirPrincipalEventos();
                    break;
                case 'ATUALIZAR':
                    $ControllerPrincipalEventos->atualizarPrincipalEventos();
                    break;
                case 'EXCLUIR':
                    $ControllerPrincipalEventos->excluirPrincipalEventos();
                    break;
                case 'ATIVAR':
                    $ControllerPrincipalEventos->ativarPrincipalEventos();
                    break;
            }
            break;
        
        case 'PRINCIPAL_VIDEO':
            require_once('controller/controllerPrincipalVideo.php');
            $ControllerPrincipalVideo = new ControllerPrincipalVideo();
            switch($modo){
                case 'INSERIR':
                    $ControllerPrincipalVideo->inserirPrincipalVideo();
                    break;
                case 'ATUALIZAR':
                    $ControllerPrincipalVideo->atualizarPrincipalVideo();
                    break;
                case 'EXCLUIR':
                    $ControllerPrincipalVideo->excluirPrincipalVideo();
                    break;
                case 'ATIVAR':
                    $ControllerPrincipalVideo->ativarPrincipalVideo();
                    break;
            }
            break;

        case 'PRINCIPAL_PATROCINIO':
            require_once('controller/controllerPrincipalPatrocinio.php');
            $ControllerPrincipalPatrocinio = new ControllerPrincipalPatrocinio();
            switch($modo){
                case 'INSERIR':
                    $ControllerPrincipalPatrocinio->inserirPrincipalPatrocinio();
                    break;
                case 'ATUALIZAR':
                    $ControllerPrincipalPatrocinio->atualizarPrincipalPatrocinio();
                    break;
                case 'EXCLUIR':
                    $ControllerPrincipalPatrocinio->excluirPrincipalPatrocinio();
                    break;
                case 'ATIVAR':
                    $ControllerPrincipalPatrocinio->ativarPrincipalPatrocinio();
                    break;
            }
            break;
    }
}

?>