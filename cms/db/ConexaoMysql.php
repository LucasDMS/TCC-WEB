<?php 

class conexaoMysql {

	private $server;
	private $user;
	private $password;
	private $database;

	public function __construct() {


<<<<<<< HEAD
		// $this->server = "localhost";
		// $this->user = "root";
		$this->server = "10.107.144.20";
		$this->user = "teste";
=======
		$this->server = "localhost";
		$this->user = "root";
>>>>>>> d5a9c9a8f97b7af1eee5b682404714aedda2d5bb
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