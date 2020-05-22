<?php  

class Usuario {
	private $id;
	private $dtCadastro;
	private $nomeLogin;
	private $senha;

	public function getId(){
		return $this->id;
	}
	public function setId($value){
		$this->id = $value;
	}

	public function getDtCadastro(){
		return $this->dtCadastro;
	}
	public function setDtCadastro($value){
		$this->dtCadastro = $value;
	}

	public function getNomeLogin(){
		return $this->nomeLogin;
	}
	public function setNomeLogin($value){
		$this->nomeLogin = $value;
	}

	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($value){
		$this->senha = $value;
	}

	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tbUsuarios WHERE id = :ID", array(
			":ID"=>$id
		));
		//if (isset($results[0]))
		if (count($results) > 0) {
			$row = $results[0];
			$this->setId($row['id']);
			$this->setDtCadastro(new DateTime($row['dtCadastro']));
			$this->setNomeLogin($row['nomeLogin']);
			$this->setSenha($row['senha']);
		}
	}

	public function __toString(){
		return json_encode(array(
			"id"=>$this->getId(),
			"dtCadastro"=>$this->getDtCadastro()->format("d/m/Y H:i:s"),
			"nomeLogin"=>$this->getNomeLogin(),
			"senha"=>$this->getSenha()
		));
	}
}

?>