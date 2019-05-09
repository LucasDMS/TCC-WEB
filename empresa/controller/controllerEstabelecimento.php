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
class ControllerEstabelecimento{

    private $EstabelecimentoDAO;

    public function __construct(){

        
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/empresa/dao/EstabelecimentoDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/empresa/model/Estabelecimento.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/empresa/view/components/imagem.php');

        //estancia da class dao de cadastro de estabelecimento
        $this->EstabelecimentoDAO = new EstabelecimentoDAO();
    }

    public function inserirEstabelecimento(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //guardando dos os dados recebidos via post em uma variavel
            $usuario = $_POST['txt_cad_usuario'];
            $senha = $_POST['txt_cad_senha'];
            $cnpj = $_POST['txt_cad_cnpj'];
            $nome = $_POST['txt_cad_responsavel'];
            $tipo_estabelecimento = $_POST['txt_cad_tipo_estabelecimento'];
            $renda = $_POST['txt_cad_renda'];
            $descricao = $_POST['txt_cad_descricao'];
            $endereco = $_POST['txt_cad_endereco'];
            $bairro = $_POST['txt_cad_bairro'];
            $cidade = $_POST['txt_cad_cidade'];
            $estado = $_POST['txt_cad_estado'];
            $email = $_POST['txt_cad_email'];
            $razao_social = $_POST['txt_cad_razao_social'];
            $nome_fantasia = $_POST['txt_cad_nome_fantasia'];
            $imagem = img($_FILES['img']);
            $ativo = 1;
            //estanciando a model e enviando todos os dados para ela
            $cadastro = new Estabelecimento();
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
            $this->EstabelecimentoDAO->inserir($cadastro);
        }


    }
    public function atualizarEstabelecimento(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_SESSION['id'];
            //guardando dos os dados recebidos via post em uma variavel
            $descricao = $_POST['txtDescricao'];
            $imagem = img($_FILES['img']);
            //estanciando a model e enviando todos os dados para ela
            $estabelecimento = new Estabelecimento();
            $estabelecimento->setImagem($imagem);
            $estabelecimento->setDescricao($descricao);
            
            //chamando o metodo de update e passando o objeto
            $this->EstabelecimentoDAO->update($id, $estabelecimento);
        }


    }
    public function buscarEstabelecimento(){
        $id = $_SESSION['id'];
        return $this->EstabelecimentoDAO->selectAll($id);
    }
        

}


?>