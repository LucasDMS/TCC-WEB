<?php 

class conexaoMysql {

	private $server;
	private $user;
	private $password;
	private $database;

	public function __construct() {

		$this->server = "localhost";
		$this->user = "root";
		$this->password = "bcd127";
		$this->database = "db_pop_soda_drink";
	}

	public function connectDatabase() {

		try {

			$conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->database, $this->user, $this->password);
			return $conexao;
			
		} catch (PDOException $erro) {

			echo ("Erro ao tentar conectar ao banco de dados!!<br>
				Linha: ". $erro->getLine().
				"<br>
				Mensagem: ". $erro->getMessage()
			);
		}
	}

	public function closeDatabase() {
		$conexao = null;
		unset($conexao);
	}
}

?>