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
            }
            break;
            
        case 'NOTICIAS':

        //TODO - ARRUMAR TUDO ISSO AQ

            require_once('controller/controllerFiquePorDentro.php');

            $controllerFiquePorDentro = new controllerFiquePorDentro();
            switch($modo){
                case 'INSERIR':
                    //Chamando o metodo de inserir uma nova FiquePorDentro
                    $controllerFiquePorDentro->inserirFiquePorDentro();
                    break;
                case 'ATUALIZAR':
                    $controllerFiquePorDentro ->atualizarFiquePorDentro();
                    break;
                case 'EXCLUIR':
                    //Chamando o metodo de excluir uma FiquePorDentro
                    $controllerFiquePorDentro->excluirFiquePorDentro();
                    break;
                case 'BUSCAR':   
                    $FiquePorDentro = $controllerFiquePorDentro->buscarFiquePorDentro();
                    require_once('index.php');
                    break;
            }
            break;

    }
}

?>