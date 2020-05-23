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
			$this->setData($results[0]);
		}
	}

	public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tbUsuarios ORDER BY nomeLogin");
	}

	public static function search($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tbUsuarios WHERE nomeLogin LIKE :SEARCH ORDER BY nomeLogin", array(
			':SEARCH'=>"%".$login."%"
		));
	}

	public function login($login, $password){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tbUsuarios WHERE nomeLogin = :LOGIN AND senha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));
		//if (isset($results[0]))
		if (count($results) > 0) {
			$this->setData($results[0]);
		} else {
			throw new Exception("Login e/ou senha inválidos.");
		}
	}

	public function setData($data){
		$this->setId($data['id']);
		$this->setDtCadastro(new DateTime($data['dtCadastro']));
		$this->setNomeLogin($data['nomeLogin']);
		$this->setSenha($data['senha']);		
	}

	public function insert(){
		$sql = new Sql();
		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
			":LOGIN"=>$this->getNomeLogin(),
			":PASSWORD"=>$this->getSenha()
		));
		if (count($results) > 0) {
			$this->setData($results[0]);
		}
	}

	public function update($login, $password){
		$this->setNomeLogin($login);
		$this->setSenha($password);

		$sql = new Sql();
		$sql->query("UPDATE tbUsuarios SET nomeLogin = :LOGIN, senha = :PASSWORD WHERE id = :ID", array(
			':LOGIN'=>$this->getNomeLogin(),
			':PASSWORD'=>$this->getSenha(),
			':ID'=>$this->getId()
		));
	} 

	public function delete(){
		$sql = new Sql();
		$sql->query("DELETE FROM tbUsuarios WHERE id = :ID", array(
			':ID'=>$this->getId()
		));
		$this->setId(0);
		$this->setNomeLogin("");
		$this->setSenha("");
		$this->setDtCadastro(new DateTime());
	}

	public function __construct($login = "", $password = ""){
		$this->setNomeLogin($login);
		$this->setSenha($password);
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