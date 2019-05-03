<?php

     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 01/05/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: class que manipula o banco de dados
    */
    class MateriaPrimaDAO{
        private $conex;
        private $MateriaPrima;
        public function __construct(){
            session_start();
            require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
            $this->conex = new conexaoMysql();
        }

        public function inserir(MateriaPrima $MateriaPrima, Prateleira $prateleira){
            $conn = $this->conex->connectDatabase();
            $sql = "Insert into tbl_materia_prima(nome,descricao,validade,tipo_materia_prima,apagado) VALUES (?,?,?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $MateriaPrima->getNome());
            $stm->bindValue(2, $MateriaPrima->getDescricao());
            $stm->bindValue(3, $MateriaPrima->getDataValidade());
            $stm->bindValue(4, $MateriaPrima->getTipoMateria());
            $stm->bindValue(5, 0);
            $stm->execute();
            $idMateria = $conn->lastInsertId();
            //Insert nos Setores
            foreach($prateleira->getId() as $result ){
                $sql = "insert into tbl_materia_prima_prateleira(id_prateleira,id_materia_prima) values(?,?);";
                $stm = $conn->prepare($sql);
                $stm->bindValue(1, $result);        
                $stm->bindValue(2, $idMateria);
                $stm->execute();
            }
            
        }
        public function update(MateriaPrima $MateriaPrima, Prateleira $prateleira){
            $conn = $this->conex->connectDatabase();
            $sql = "UPDATE tbl_materia_prima SET nome = ?, descricao = ?, validade = ?, tipo_materia_prima = ? where id_materia_prima=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $MateriaPrima->getNome());
            $stm->bindValue(2, $MateriaPrima->getDescricao());
            $stm->bindValue(3, $MateriaPrima->getDataValidade());
            $stm->bindValue(4, $MateriaPrima->getTipoMateria());
            $stm->bindValue(5, $MateriaPrima->getId());
            $stm->execute();
            
            //Atualizando os setores onde o produto está
            $sql = "delete from tbl_materia_prima_prateleira where id_materia_prima =? ";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $MateriaPrima->getId()); 
            $stm->execute();
            //Insert nos Setores
            foreach($prateleira->getId() as $result ){
                $sql = "insert into tbl_materia_prima_prateleira(id_prateleira,id_materia_prima) values(?,?);";
                $stm = $conn->prepare($sql);
                $stm->bindValue(1, $result);        
                $stm->bindValue(2, $MateriaPrima->getId());
            
                $stm->execute();
    
            }
            
        }

        public function delete($id){
            $conn = $this->conex->connectDatabase();
            $sql = "UPDATE tbl_materia_prima SET apagado = ? where id_materia_prima = ?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, 1);
            $stm->bindValue(2, $id);
            $sucess = $stm->execute();
            $this->conex->closeDataBase();
            echo($id);
            if ($sucess){
                echo $success;
                return "Sucesso";
            }else{
                echo $success;
                return "Erro";
            }
        }

        public function selectById($id){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_materia_prima where id_materia_prima=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $id);
            $sucess = $stm->execute();
            if($sucess){
                foreach($stm->fetchAll(PDO::FETCH_ASSOC) AS $result){
                    $MateriaPrima = new MateriaPrima();
                    $MateriaPrima->setId($result['id_materia_prima']);
                    $MateriaPrima->setNome($result['nome']);
                    $MateriaPrima->setDescricao($result['descricao']);
                    $MateriaPrima->setTipoMateria($result['tipo_materia_prima']);
                    $MateriaPrima->setDataValidade($result['validade']);
                    return $MateriaPrima;
                };
                $this->conex->closeDataBase();
            }
        }
        public function selectByIdProduto($id){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_produto_materia_prima where id_produto=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $id);
            $sucess = $stm->execute();
            if($sucess){
                $listMateriaPrima = [];
                foreach($stm->fetchAll(PDO::FETCH_ASSOC) AS $result){
                    $ProdutoMateriaPrima = new ProdutoMateriaPrima();
                    $ProdutoMateriaPrima->setId($result['id_produto_materia_prima']);
                    $ProdutoMateriaPrima->setIdProduto($result['id_produto']);
                    $ProdutoMateriaPrima->setIdMateriaPrima($result['id_materia_prima']);
                   
                    array_push($listMateriaPrima, $ProdutoMateriaPrima);
                };
                $this->conex->closeDataBase();
                return $listMateriaPrima;
            }
        }

        public function selectAll(){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_materia_prima where apagado = 0 AND tipo_materia_prima = 'Materia'";
            $stm = $conn->prepare($sql);
            $success =$stm->execute();
            if($success){
                $listMateriaPrima = [];

                foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $MateriaPrima = new MateriaPrima();
                    $MateriaPrima->setId($result['id_materia_prima']);
                    $MateriaPrima->setNome($result['nome']);
                    $MateriaPrima->setDescricao($result['descricao']);
                    $MateriaPrima->setTipoMateria($result['tipo_materia_prima']);
                    $MateriaPrima->setDataValidade($result['validade']);

                    array_push($listMateriaPrima, $MateriaPrima);
                };

                $this->conex->closeDataBase();
                return $listMateriaPrima;
            }else{
                return "Erro";
            };
            
        }
        public function selectAllEmbalagem(){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_materia_prima where apagado = 0 AND tipo_materia_prima = 'Embalagem'";
            $stm = $conn->prepare($sql);
            $success =$stm->execute();
            if($success){
                $listMateriaPrima = [];
                foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $MateriaPrima = new MateriaPrima();
                    $MateriaPrima->setId($result['id_materia_prima']);
                    $MateriaPrima->setNome($result['nome']);
                    $MateriaPrima->setDescricao($result['descricao']);
                    $MateriaPrima->setTipoMateria($result['tipo_materia_prima']);
                    $MateriaPrima->setDataValidade($result['validade']);
                    array_push($listMateriaPrima, $MateriaPrima);
                };
                

                $this->conex->closeDataBase();
                return $listMateriaPrima;
            }else{
                return "Erro";
            }; 
        }
    }



?>

