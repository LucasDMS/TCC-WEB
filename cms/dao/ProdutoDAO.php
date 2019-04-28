<?php 
class ProdutoDAO{

    private $conex;
    private $produto;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(Produto $produto, Nutricional $nutricional, Setor $setor, MateriaPrima $materiaPrima, MateriaPrima $embalagem) {
        $conn = $this->conex->connectDatabase();

        //Insert da tabela nutricional
        $sql = "insert into tbl_nutricional(valor_calorico, carboidratos, proteina, gorduras_totais, gorduras_saturadas, gorduras_trans, fibra_alimentar, sodio) values(?,?,?,?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $nutricional->getValorCalorico());        
        $stm->bindValue(2, $nutricional->getCarboidratos());
        $stm->bindValue(3, $nutricional->getProteina());
        $stm->bindValue(4, $nutricional->getGordurasTotais());
        $stm->bindValue(5, $nutricional->getGordurasSaturadas());        
        $stm->bindValue(6, $nutricional->getGordurasTrans());
        $stm->bindValue(7, $nutricional->getFibrasAlimentar());
        $stm->bindValue(8, $nutricional->getSodio());
        $stm->execute();
        //Insert do produto
        $sql = "insert into tbl_produto(nome, descricao, tamanho, modo_preparo, tempo_producao, ipi, ativo, apagado, ordem, produto_destaque, imagem, id_nutricional) values(?,?,?,?,?,?,?,?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $produto->getNome());        
        $stm->bindValue(2, $produto->getDescricao());
        $stm->bindValue(3, $produto->getTamanho());
        $stm->bindValue(4, $produto->getModoPreparo());
        $stm->bindValue(5, $produto->getTempoProducao());        
        $stm->bindValue(6, $produto->getIpi());
        $stm->bindValue(7, $produto->getAtivo());
        $stm->bindValue(8, $produto->getApagado());
        $stm->bindValue(9, $produto->getOrdem());        
        $stm->bindValue(10, $produto->getProdutoDestaque());
        $stm->bindValue(11, $produto->getImagem());
        $stm->bindValue(12, $conn->lastInsertId());
        $stm->execute();
        $idProduto = $conn->lastInsertId();
        
        //Insert nos Setores
        foreach($setor->getId() as $result){
            $sql = "insert into tbl_produto_setores_produto(id_setores,id_produto) values(?,?);";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $result);        
            $stm->bindValue(2, $idProduto);
            $stm->execute();
        }

        //Insert nos MateriaPrima
        foreach($materiaPrima->getId() as $result){
            $sql = "insert into tbl_produto_materia_prima(id_materia_prima,id_produto) values(?,?);";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $result);        
            $stm->bindValue(2, $idProduto);
            $stm->execute();
        }

        $sql = "insert into tbl_produto_materia_prima(id_materia_prima,id_produto) values(?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $embalagem->getId());        
        $stm->bindValue(2, $idProduto);
        $stm->execute();
        $this->conex->closeDataBase();
    }
    public function update(Produto $produto, Nutricional $nutricional, Setor $setor, MateriaPrima $materiaPrima, MateriaPrima $embalagem) {
        $conn = $this->conex->connectDatabase();
        //If para saber se tem ou não imagem no update
        if($produto->getImagem() == null){
            $sql = "UPDATE tbl_nutricional SET valor_calorico = ?, carboidratos = ?, proteina = ?, gorduras_totais = ?, gorduras_saturadas = ?, gorduras_trans = ?, fibra_alimentar = ?, sodio = ?  WHERE id_nutricional=?;";
            $stm = $conn->prepare($sql);
             //Setando os valores da query
            $stm->bindValue(1, $nutricional->getValorCalorico());        
            $stm->bindValue(2, $nutricional->getCarboidratos());
            $stm->bindValue(3, $nutricional->getProteina());
            $stm->bindValue(4, $nutricional->getGordurasTotais());
            $stm->bindValue(5, $nutricional->getGordurasSaturadas());        
            $stm->bindValue(6, $nutricional->getGordurasTrans());
            $stm->bindValue(7, $nutricional->getFibrasAlimentar());
            $stm->bindValue(8, $nutricional->getSodio());
            $stm->bindValue(9, $nutricional->getId());
            $stm->execute();

            $sql = "UPDATE tbl_produto SET nome = ?, descricao = ?, tamanho = ?, modo_preparo = ?, tempo_producao = ?, ipi = ?  WHERE id_produto=?;";
            $stm = $conn->prepare($sql);
            //Setando os valores da query
            $stm->bindValue(1, $produto->getNome());        
            $stm->bindValue(2, $produto->getDescricao());
            $stm->bindValue(3, $produto->getTamanho());
            $stm->bindValue(4, $produto->getModoPreparo());
            $stm->bindValue(5, $produto->getTempoProducao());        
            $stm->bindValue(6, $produto->getIpi());
            $stm->bindValue(7, $produto->getId());
            $stm->execute();
            //Atualizando as materias primas utilizadas no produto
            $sql = "delete from tbl_produto_materia_prima where id_produto =? ";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $produto->getId()); 
            $stm->execute();
            //Insert na materia prima
            foreach($materiaPrima->getId() as $result){
                $sql = "insert into tbl_produto_materia_prima(id_materia_prima,id_produto) values(?,?);";
                $stm = $conn->prepare($sql);
                $stm->bindValue(1, $result);        
                $stm->bindValue(2, $produto->getId());
                $stm->execute();
            }
             //Insert na embalagem
            $sql = "insert into tbl_produto_materia_prima(id_materia_prima,id_produto) values(?,?);";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $embalagem->getId());        
            $stm->bindValue(2, $produto->getId());
            $stm->execute();

            //Atualizando os setores onde o produto está
            $sql = "delete from tbl_produto_setores_produto where id_produto =? ";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $produto->getId()); 
            $stm->execute();
            //Insert nos Setores
            foreach($setor->getId() as $result){
                $sql = "insert into tbl_produto_setores_produto(id_setores,id_produto) values(?,?);";
                $stm = $conn->prepare($sql);
                $stm->bindValue(1, $result);        
                $stm->bindValue(2, $produto->getId());
                $stm->execute();
            }
        }else{
            $sql = "UPDATE tbl_nutricional SET valor_calorico = ?, carboidratos = ?, proteina = ?, gorduras_totais = ?, gorduras_saturadas = ?, gorduras_trans = ?, fibra_alimentar = ?, sodio = ?  WHERE id_nutricional=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $nutricional->getValorCalorico());        
            $stm->bindValue(2, $nutricional->getCarboidratos());
            $stm->bindValue(3, $nutricional->getProteina());
            $stm->bindValue(4, $nutricional->getGordurasTotais());
            $stm->bindValue(5, $nutricional->getGordurasSaturadas());        
            $stm->bindValue(6, $nutricional->getGordurasTrans());
            $stm->bindValue(7, $nutricional->getFibrasAlimentar());
            $stm->bindValue(8, $nutricional->getSodio());
            $stm->bindValue(9, $nutricional->getId());
            $stm->execute();
            //Setando os valores da querys
            $sql = "UPDATE tbl_produto SET nome = ?, descricao = ?, tamanho = ?, modo_preparo = ?, tempo_producao = ?, ipi = ?, imagem = ?  WHERE id_produto=?;";
            $stm = $conn->prepare($sql);
            //Setando os valores da query
            $stm->bindValue(1, $produto->getNome());        
            $stm->bindValue(2, $produto->getDescricao());
            $stm->bindValue(3, $produto->getTamanho());
            $stm->bindValue(4, $produto->getModoPreparo());
            $stm->bindValue(5, $produto->getTempoProducao());        
            $stm->bindValue(6, $produto->getIpi());
            $stm->bindValue(7, $produto->getImagem());
            $stm->bindValue(8, $produto->getId());
           $stm->execute();
        }
        
        
        $this->conex->closeDataBase();
    }
    //Ativando ou desativando o conteudo no site
    public function updateAtivo(Produto $produto) {

        $conn = $this->conex->connectDatabase();

        if($produto->getAtivo()=="0"){
            $produto->setAtivo("1");
        }
        else {
            $produto->setAtivo("0");
        }
        //Query de update
        $sql = "update tbl_produto set ativo=? where id_produto=?";

        $stm = $conn->prepare($sql);
        //Setando os valores
        $stm->bindValue(1, $produto->getAtivo());
        $stm->bindValue(2, $produto->getId());
        //Executando a query
        $stm->execute();

        $this->conex->closeDataBase();
    }
    //Deletando o registro 
    public function delete($id){
        $conn = $this->conex->connectDatabase();
        //Query do "Delete"
        $sql = "UPDATE tbl_produto SET apagado = 1 WHERE id_produto=?;";
        $stm = $conn->prepare($sql);
        //Setando o valor
        $stm->bindValue(1, $id);
        $success = $stm->execute();

        $this->conex->closeDataBase();
        if ($success) {
            echo $success;
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }
    //Select para pegar um produto especifico
    public function selectByIdProduto($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_produto As p, tbl_nutricional AS n where p.id_nutricional=n.id_nutricional AND id_produto=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            $Produto = new Produto();
            $Produto->setId($result['id_produto']);
            $Produto->setNome($result['nome']);
            $Produto->setDescricao($result['descricao']);
            $Produto->setTamanho($result['tamanho']);
            $Produto->setModoPreparo($result['modo_preparo']);
            $Produto->setTempoProducao($result['tempo_producao']);
            $Produto->setIpi($result['ipi']);
            $Produto->setAtivo($result['ativo']);
            $Produto->setApagado($result['apagado']);
            $Produto->setIdNutricional($result['id_nutricional']);

            return $Produto;
        }
    }
    //Select para pegar tabela nutricional para um produto especifico
    public function selectByIdNutricional($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_produto As p, tbl_nutricional AS n where p.id_nutricional=n.id_nutricional AND id_produto=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            $Nutricional = new Nutricional();
            $Nutricional->setId($result['id_nutricional']);
            $Nutricional->setValorCalorico($result['valor_calorico']);
            $Nutricional->setCarboidratos($result['carboidratos']);
            $Nutricional->setProteina($result['proteina']);
            $Nutricional->setGordurasTotais($result['gorduras_totais']);
            $Nutricional->setGordurasSaturadas($result['gorduras_saturadas']);
            $Nutricional->setGordurasTrans($result['gorduras_trans']);
            $Nutricional->setFibrasAlimentar($result['fibra_alimentar']);
            $Nutricional->setSodio($result['sodio']);
            return $Nutricional;
        }
    }
    //Selecionando todos os registros do banco 
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_produto where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();

        if ($success) {
            //Criando uma lista com os dados
            $listProduto = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Produto = new Produto();
                $Produto->setId($result['id_produto']);
                $Produto->setNome($result['nome']);
                $Produto->setDescricao($result['descricao']);
                $Produto->setTamanho($result['tamanho']);
                $Produto->setModoPreparo($result['modo_preparo']);
                $Produto->setTempoProducao($result['tempo_producao']);
                $Produto->setIpi($result['ipi']);
                $Produto->setIdNutricional($result['id_nutricional']);
                $Produto->setAtivo($result['ativo']);
                $Produto->setApagado($result['apagado']);

                array_push($listProduto, $Produto);
            };

            $this->conex -> closeDataBase();
            //retornando a lista
            return $listProduto;
        } else {
            return "Erro";
        }
    }
}
?>