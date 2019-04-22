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

                case 'ATIVAR':
                    //Chamando o metodo de Ativar o Estabelecimento
                    $ControllerEstabelecimento->ativarEstabelecimento();
                    break;
            }
            break;
            
        case 'PRODUTO_DESTAQUE':
            require_once('controller/controllerProdutoDestaque.php');
            $ControllerProduto_Destaque = new ControllerProdutoDestaque();
            switch($modo){
                case 'INSERIR':
                    //Chamando o metodo de inserir um Produto em Destaque
                    $ControllerProduto_Destaque->inserirProduto_Destaque();
                    break;
                case 'ATUALIZAR':
                    $ControllerProduto_Destaque ->atualizarProduto_Destaque();
                    break;
                case 'EXCLUIR':
                    //Chamando o metodo de excluir um Produto em Destaque
                    $ControllerProduto_Destaque->excluirProduto_Destaque();
                    break;

                case 'ATIVAR':
                    //Chamando o metodo de Ativar um Produto em Destaque
                    $ControllerProduto_Destaque->ativarProduto_Destaque();
                    break;
            }
            break;
            
        case 'SOBRE_NOS':

            require_once('controller/controllerSobreNos.php');
            
            $ControllerSobreNos = new ControllerSobreNos();

            switch($modo){
                case 'INSERIR':

                    $ControllerSobreNos->inserirSobreNos();
                    break;
                case 'ATUALIZAR':

                    $ControllerSobreNos ->atualizarSobreNos();
                    break;
                case 'EXCLUIR':
                    $ControllerSobreNos->excluirSobreNos();
                    break;

                case 'ATIVAR':
                    $ControllerSobreNos->ativarSobreNos();
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

                case 'ATIVAR':

                    $ControllerFaleConosco->ativarFaleConosco();
                    break;
            }
            break;
        case 'SUSTENTABILIDADE':
            require_once('controller/controllerSustentabilidade.php');
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

                case 'ATIVAR':

                    $ControllerSustentabilidade->ativarSustentabilidade();
                    break;
            }
            break;
        case 'PROMOCAO':
            require_once('controller/controllerPromocao.php');
            $ControllerPromocao = new ControllerPromocao();
            switch($modo){
                case 'INSERIR':
                    
                    //Chamando o metodo de inserir uma nova Promocao
                    $ControllerPromocao->inserirPromocao();
                    
                    break;
                case 'ATUALIZAR':
                    $ControllerPromocao ->atualizarPromocao();
                    break;
                case 'EXCLUIR':
                    //Chamando o metodo de excluir uma Promocao
                    $ControllerPromocao->excluirPromocao();
                    break;

                case 'ATIVAR':

                    $ControllerPromocao->ativarPromocao();
                    break;
            }
            break;
            case 'PRODUTOS':
            require_once('controller/controllerProdutos.php');
            $ControllerProdutos = new ControllerProdutos();
            switch($modo){
                case 'ATIVAR':
                    $ControllerProdutos->ativarProduto();
                    break;
            }
            break;
        case 'MVV':
            require_once('controller/controllerMVV.php');
            $ControllerMVV = new ControllerMVV();
            switch($modo){
                case 'INSERIR':
                    
                //Chamando o metodo de inserir uma nova MVV
                $ControllerMVV->inserirMVV();
                
                break;
                case 'ATUALIZAR':
                    $ControllerMVV ->atualizarMVV();
                    break;
                case 'EXCLUIR':
                    //Chamando o metodo de excluir uma MVV
                    $ControllerMVV->excluirMVV();
                    break;
                case 'ATIVAR':

                    $ControllerMVV->ativarMVV();
                    break;
            }
            break;
        case 'TEXTOPRINCIPAL':
            require_once('controller/controllerTextoPrincipal.php');
            $ControllerTextoPrincipal = new ControllerTextoPrincipal();
            switch($modo){
                case 'INSERIR':
                    //Chamando o metodo de inserir uma nova TextoPrincipal
                    $ControllerTextoPrincipal->inserirTextoPrincipal();
                    break;
                
                case 'ATUALIZAR':
                    $ControllerTextoPrincipal ->atualizarTextoPrincipal();
                    break;
                
                case 'EXCLUIR':
                    //Chamando o metodo de excluir uma TextoPrincipal
                    $ControllerTextoPrincipal->excluirTextoPrincipal();
                    break;

                case 'BUSCAR':   
                    $TextoPrincipal =$ControllerTextoPrincipal->buscarTextoPrincipalPorId();
                    break;
                
                case 'ATIVAR':
                    $ControllerTextoPrincipal->ativarTextoPrincipal();
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

        case 'CADASTRO_ESTABELECIMENTO':
            require_once('controller/controllerCadastroEstabelecimento.php');
            $controller = new controllerCadastroEstabelecimento();

            switch($modo){
                case 'INSERIR':
                    $controller->inserirCadastroEstabelecimento();
                    break;
            }
        
        case 'CADASTRO_USUARIO':
            require_once('controller/controllerCadastroUsuario.php');
            $controller = new controllerCadastroUsuario();

            switch($modo){
                case 'INSERIR':
                    $controller->inserirCadastroUsuario();
                    break;
            }

        case 'POPS_ESCOLA':
            require_once('controller/controllerPopsEscola.php');
            $ControllerPopsEscola = new ControllerPopsEscola();
            switch($modo){
                case 'INSERIR':
                    $ControllerPopsEscola->inserirPopsEscola();
                    break;
                case 'ATUALIZAR':
                    $ControllerPopsEscola->atualizarPopsEscola();
                    break;
                case 'EXCLUIR':
                    $ControllerPopsEscola->excluirPopsEscola();
                    break;
                case 'ATIVAR':
                    $ControllerPopsEscola->ativarPopsEscola();
                    break;
            }
            break;
        
            case 'FUNCIONARIO':
            require_once('controller/controllerFuncionario.php');
            $ControllerFuncionario = new ControllerFuncionario();
            switch($modo){
                case 'INSERIR':
                    $ControllerFuncionario->inserirFuncionario();
                    break;
                case 'ATUALIZAR':
                    $ControllerFuncionario->atualizarFuncionario();
                    break;
                case 'EXCLUIR':
                    $ControllerFuncionario->excluirFuncionario();
                    break;
                case 'ATIVAR':
                    $ControllerFuncionario->ativarFuncionario();
                    break;
            }
            break;
    }
}


?>