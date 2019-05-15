<?php
class CarrinhoDAO {
    private $conex;
    private $compras;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    //Select para todos os PRODUTOS
    public function selectAll($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * FROM vw_carrinho_compra WHERE autenticacao = ?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1,$id);
        $success = $stm->execute();
        if ($success) {
            $listcarrinho = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Carrinho = new Carrinho();
                $Carrinho->setId($result['produto']);
                $Carrinho->setNome($result['nome']);
                $Carrinho->setImagem($result['imagem']); 
                $Carrinho->setDescricao($result['descricao']);   
                $Carrinho->setPreco($result['preco']);   
                $Carrinho->setQuantidade($result['quantidade']);   
                array_push($listcarrinho, $Carrinho);
            };
            $this->conex -> closeDataBase();
            return $listcarrinho;
           
        } else {
            return "Erro";
        }
    }

    public function delete($id, $idAutenticacao){
        $conn = $this->conex->connectDatabase();
        $sql = "DELETE FROM tbl_pedido_produtos WHERE id_produto = ? and id_autenticacao=?";
        $stm =  $conn->prepare($sql);
        $stm->bindValue(1,$id);
        $stm->bindValue(2,$idAutenticacao);
        $stm->execute();
    }
}