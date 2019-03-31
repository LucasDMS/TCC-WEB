<?php 

    $controller = null;
    $modo = null;

    if(isset($_GET['controller'])){

        $controller = strtoupper($_GET['controller']);
        $modo = strtoupper($_GET['modo']);

        switch($controller){
            case 'SESSAO':

                require_once('controller/sessaoController.php');

                $controllerSessao = new controllerSessao();

                switch($modo){
                    case 'LOGAR':
                        $controllerSessao->logar();
                        break;
                }

                break;

            case 'HISTORIA':
                //Import da classe de controller
                require_once('controller/ControllerHistoria.php');
                //Instancia da controller de historia
                $ControllerHistoria = new ControllerHistoria();

                switch($modo){
                    case 'INSERIR':
                        //Chamando o metodo de inserir uma nova historia
                        $ControllerHistoria->inserirHistoria();
                        break;
                    case 'ATUALIZAR':
                        $ControllerHistoria ->atualizarHistoria();
                        break;
                    case 'EXCLUIR':
                        //Chamando o metodo de excluir uma historia
                        $ControllerHistoria->excluirHistoria();
                        break;
                    case 'BUSCAR':   
                        $historia = $ControllerHistoria->buscarHistoriaPorId();
                        require_once('index.php');
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