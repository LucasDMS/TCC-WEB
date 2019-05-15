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

        case 'BRINDE':

            require_once('controller/controllerBrinde.php');
            
            $ControllerBrinde = new ControllerBrinde();

            switch($modo){
                case 'INSERIR':

                    $ControllerBrinde->inserirBrinde();
                    break;
                case 'ATUALIZAR':

                    $ControllerBrinde ->atualizarBrinde();
                    break;
                case 'EXCLUIR':

                    $ControllerBrinde->excluirBrinde();
                    break;

                case 'ATIVAR':
                    $ControllerBrinde->ativarBrinde();
                    break;
            }
            break;
        case 'CARRINHO':
            require_once('controller/controllerCarrinho.php');
            
            $Controller = new ControllerCarrinho();
            switch($modo){
                case 'INSERIR':
                    $Controller->inserirCarrinho();
                    break;
                case 'ATUALIZAR':
                    $Controller ->atualizarUsuarioEstabelecimento();
                    break;
                case 'EXCLUIR':
                    $Controller->excluirCarrinho();
                    break;
                case 'ATIVAR':
                    $Controller->ativarUsuarioEstabelecimento();
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