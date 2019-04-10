<?php

class controllerCadastroEstabelecimento{

    private $cadastroEstabelecimentoDAO;

    public function __contruct(){

        
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/cms/CadastroEstabelecimentoDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/cms/db/ConexaoMysql.php');

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
            $descricao = $_POST['descricao'];
            $endereco = $_POST['txt_endereco'];
            $bairro = $_POST['txt_bairro'];
            $cidade = $_POST['txt_cidade'];
            $estado = $_POST['txt_estado'];
            $email = $_POST['txt_email'];

            $cadastroDAO = new CadastroEstabelecimentoDAO();

        }


    }
        

}


?>