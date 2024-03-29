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

        case 'USUARIO_ESTABELECIMENTO':

            require_once('controller/controllerUsuarioEstabelecimento.php');
            
            $ControllerUsuarioEstabelecimento = new ControllerUsuarioEstabelecimento();

            switch($modo){
                case 'INSERIR':

                    $ControllerUsuarioEstabelecimento->inserirUsuarioEstabelecimento();
                    break;
                case 'ATUALIZAR':

                    $ControllerUsuarioEstabelecimento ->atualizarUsuarioEstabelecimento();
                    break;
                case 'EXCLUIR':

                    $ControllerUsuarioEstabelecimento->excluirUsuarioEstabelecimento();
                    break;

                case 'ATIVAR':
                    $ControllerUsuarioEstabelecimento->ativarUsuarioEstabelecimento();
                    break;
            }
            break;
        case 'CADASTRO_ESTABELECIMENTO':
            require_once('controller/controllerEstabelecimento.php');
            $controller = new controllerEstabelecimento();

            switch($modo){
                case 'INSERIR':
                    $controller->inserirEstabelecimento();
                    break;
                case 'ATUALIZAR':
                $controller->atualizarEstabelecimento();
                break;
            }
        case 'COMPRAS':

            require_once('controller/controllerCompras.php');
            
            $Controller = new ControllerCompras();

            switch($modo){
                case 'INSERIR':

                    $Controller->inserirCarrinho();
                    break;
                case 'ATUALIZAR':

                    $Controller ->atualizarUsuarioEstabelecimento();
                    break;
                case 'EXCLUIR':

                    $Controller->excluirUsuarioEstabelecimento();
                    break;

                case 'ATIVAR':
                    $Controller->ativarUsuarioEstabelecimento();
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
        
        case 'CADASTRO_CARRINHO':

            require_once('controller/controllerCarrinho.php');
            
            $Controller = new ControllerCarrinho();

            switch($modo){
                case 'INSERIR':

                $Controller->inserirCarrinho();
                break;
            }
            break;
    }
}


?>