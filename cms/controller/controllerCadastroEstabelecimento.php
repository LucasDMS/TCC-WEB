<?php
/*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 10/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: class que controla os dados.
    */
class controllerCadastroEstabelecimento{

    private $cadastroEstabelecimentoDAO;

    public function __construct(){

        
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/cms/dao/CadastroEstabelecimentoDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/cms/model/CadastroEstabelecimento.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/cms/view/components/imagem.php');

        //estancia da class dao de cadastro de estabelecimento
        $this->cadastroEstabelecimentoDAO = new CadastroEstabelecimentoDAO();
    }

    public function inserirCadastroEstabelecimento(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //guardando dos os dados recebidos via post em uma variavel
            $usuario = $_POST['txt_usuario'];
            $senha = $_POST['txt_senha'];

            $cnpj = $_POST['txt_cnpj'];
            $nome = $_POST['txt_nome'];
            $tipo_estabelecimento = $_POST['txt_tipo_estabelecimento'];
            $renda = $_POST['txt_renda'];
            $descricao = $_POST['txt_descricao'];
            $endereco = $_POST['txt_endereco'];
            $bairro = $_POST['txt_bairro'];
            $cidade = $_POST['txt_cidade'];
            $estado = $_POST['txt_estado'];
            $email = $_POST['txt_email'];
            $razao_social = $_POST['txt_razao_social'];
            $nome_fantasia = $_POST['txt_nome_fantasia'];
            $imagem = img($_FILES['img']);
            $ativo = 1;

            //estanciando a model e enviando todos os dados para ela
            $cadastro = new CadastroEstabelecimento();
            $cadastro->setUsuario($usuario);
            $cadastro->setSenha($senha);
            $cadastro->setCnpj($cnpj);
            $cadastro->setNome($nome);
            $cadastro->setTipo_estabelecimento($tipo_estabelecimento);
            $cadastro->setRenda($renda);
            $cadastro->setDescricao($descricao);
            $cadastro->setEndereco($endereco);
            $cadastro->setBairro($bairro);
            $cadastro->setCidade($cidade);
            $cadastro->setEstado($estado);
            $cadastro->setEmail($email);
            $cadastro->setRazao_social($razao_social);
            $cadastro->setNome_fantasia($nome_fantasia);
            $cadastro->setImagem($imagem);
            $cadastro->setAtivo($ativo);
            //chamando o metodo de insert e passando o objeto
            $this->cadastroEstabelecimentoDAO->inserir($cadastro);
        }
    }
}


?>