<?php 

$controller = null;
$modo = null;

if(isset($_GET['controller'])){

    $controller = strtoupper($_GET['controller']);
    $modo = strtoupper($_GET['modo']);

    switch($controller){
        case 'SESSAO':

            require_once('controller/controllerSessao.php');

            $ControllerSessao = new ControllerSessao();

            switch($modo){
                case 'LOGAR':
                    $ControllerSessao->logar();
                    break;
            }
            break;

        case 'HISTORIA':

            require_once('controller/controllerHistoria.php');
            
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

                case 'ATIVAR':
                    $ControllerHistoria->ativarHistoria();
                    break;
            }
            break;

        case 'PROMOCAO':

        require_once('../cms/controller/controllerPromocao.php');
        
        $ControllerPromocao = new ControllerPromocao();

        switch($modo){
            case 'PARTICIPAR':
                $ControllerPromocao->participar();
                break;
            case 'ATIVAR':
                $ControllerPromocao->ativarPromocao();
                break;
        }
        break;
    }
}


?>