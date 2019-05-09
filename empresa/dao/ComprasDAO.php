<?php
class ComprasDAO {
    private $conex;
    private $compras;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    
    
    //Update no UsuarioEstabelecimento ativo
    public function updateAtivo(UsuarioEstabelecimento $UsuarioEstabelecimento) {
        $conn = $this->conex->connectDatabase();
        if($UsuarioEstabelecimento->getAtivo()=="0"){
            $UsuarioEstabelecimento->setAtivo("1");
        }
        else {
            $UsuarioEstabelecimento->setAtivo("0");
        }
        $sql = "update tbl_usuario_estabelecimento set ativo=? where id_usuario_estabelecimento=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $UsuarioEstabelecimento->getAtivo());
        $stm->bindValue(2, $UsuarioEstabelecimento->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }

    //Select para pegar um UsuarioEstabelecimento especifico
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_produto where apagado = ? and id_produto=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, 0);    
        $stm->bindValue(2, $id);     
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            $Compras = new compras();
            $Compras->setId($result['id_produto']);
            $Compras->setNome($result['nome']);
            $Compras->setDescricao($result['descricao']);
            $Compras->setImagem($result['imagem']);
            $Compras->setPreco($result['preco']);
          
            return $Compras;

        }
    }
    //Select para todos os PRODUTOS
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_produto where apagado = ?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, 0);
        $success = $stm->execute();
        if ($success) {
            $listprodutos = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Compras = new Compras();
                $Compras->setId($result['id_produto']);
                $Compras->setNome($result['nome']);
                $Compras->setDescricao($result['descricao']);   
                $Compras->setImagem($result['imagem']);  
                $Compras->setPreco($result['preco']);   
                array_push($listprodutos, $Compras);
            };
            $this->conex -> closeDataBase();
            return $listprodutos;
           
        } else {
            return "Erro";
        }
    }
}