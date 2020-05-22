<?php  
//CONEXÃO COM BANCO DE DADOS
//PDO (PHP DATA OBJECT) UTILIZANDO DAO (DATA ACCES OBJECT)
//TRANSAÇÕES - Usando COMMIT e ROLLBACK para confirmar ou desfazer procedimentos que não deram certo

class Sql extends PDO {	//Classe Sql extendida da classe PDO que é nativa do PHP (ela pode fazer tudo que PDO faz)
	private $conexao;
	public function __construct(){
		$this->conexao = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "");
	}

	private function setParams($statment, $parameters = array()){
		foreach ($parameters as $key => $value) {
			$this->setParam($key, $value);
		}	
	}

	private function setParam($statment, $key, $value){
		$statment->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array()){
		$stmt = $this->conexao->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;
	}

	public function select($rawQuery, $params = array()):array
	{
		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}


?>