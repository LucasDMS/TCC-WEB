<?php

class controllerCadastroEstabelecimento{

    private $cadastroEstabelecimentoDAO;

    public function __construct(){

        
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/cms/dao/CadastroEstabelecimentoDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/cms/model/Cadastro_estabelecimento.php');

        $this->cadastroEstabelecimentoDAO = new CadastroEstabelecimentoDAO();
    }

    public function inserirCadastroEstabelecimento(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

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
            $imagem = 'ss';
            $ativo = 1;

            $cadastro = new Cadastro_estabelecimento();
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
            
            $this->cadastroEstabelecimentoDAO->inserir($cadastro);
        }


    }
        

}


?>