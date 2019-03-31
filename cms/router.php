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
                require_once('controller/controllerHistoria.php');
                //Instancia da controller de historia
                $controllerHistoria = new controllerHistoria();

                switch($modo){
                    case 'INSERIR':
                        //Chamando o metodo de inserir uma nova historia
                        $controllerHistoria->inserirHistoria();
                        break;
                    case 'ATUALIZAR':
                        $controllerHistoria ->atualizarHistoria();
                        break;
                    case 'EXCLUIR':
                        //Chamando o metodo de excluir uma historia
                        $controllerHistoria->excluirHistoria();
                        break;
                    case 'BUSCAR':   
                        $historia = $controllerHistoria->buscarHistoriaPorId();
                        require_once('index.php');
                        break;
                }
                break;
                
            case 'FIQUEPORDENTRO':

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