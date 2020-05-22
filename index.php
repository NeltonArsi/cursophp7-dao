<?php  

require_once("config.php");

/*$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM tbUsuarios");
echo json_encode($usuarios);*/

//Carrega apenas um usuário
//$nome = new Usuario();
//$nome->loadById(4);
//echo $nome;

//Carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega uma lista de usuários buscando pelo login
//$search = Usuario::search("i");
//echo json_encode($search);

//Carrega um usuário pelo login e senha
$usuario = new Usuario();
$usuario->login("N@rsi", "1234567890");
echo $usuario;

?>