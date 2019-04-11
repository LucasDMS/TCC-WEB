<?php
/*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 11/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: class que controla os dados.
    */
class controllerCadastroUsuario{

    private $cadastroUsuarioDAO;

    public function __construct(){

        
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/cms/dao/CadastroUsuarioDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/cms/model/Cadastro_usuario.php');

        //estancia da class dao de cadastro de USUARIO
        $this->cadastroUsuarioDAO = new CadastroUsuarioDAO();
    }

    public function inserirCadastroUsuario(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //guardando dos os dados recebidos via post em uma variavel
            $usuario = $_POST['txt_usuario'];
            $senha = $_POST['txt_senha'];

            $cpf = $_POST['txt_cpf'];
            $nome = $_POST['txt_nome'];
            $sexo = $_POST['sexo'];
            $endereco = $_POST['txt_endereco'];
            $bairro = $_POST['txt_bairro'];
            $cidade = $_POST['txt_cidade'];
            $estado = $_POST['txt_estado'];
            $email = $_POST['txt_email'];

            //estanciando a model e enviando todos os dados para ela
            $cadastro = new Cadastro_usuario();
            $cadastro->setLogin($usuario);
            $cadastro->setSenha($senha);
            $cadastro->setCpf($cpf);
            $cadastro->setNome($nome);
            $cadastro->setSexo($sexo);
            $cadastro->setEndereco($endereco);
            $cadastro->setBairro($bairro);
            $cadastro->setCidade($cidade);
            $cadastro->setEstado($estado);
            $cadastro->setEmail($email);
            //chamando o metodo de insert e passando o objeto
            $this->cadastroUsuarioDAO->inserir($cadastro);
        }


    }
        

}


?>