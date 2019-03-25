
<?php 

    $controller = null;
    $modo = null;

    if(isset($_GET['controller'])){

        $controller = strtoupper($_GET['controller']);
        $modo = strtoupper($_GET['modo']);

        switch($controller){

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
                        $historia = $controllerHistoria->buscarHistoria();
                        require_once('index.php');
                        break;
                }
            break;
        }
    }
?>