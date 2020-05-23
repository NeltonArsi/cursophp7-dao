<?php  

require_once("config.php");

/*$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM tbUsuarios");
echo json_encode($usuarios);*/

//Carrega apenas um usuário
/*$nome = new Usuario();
$nome->loadById(4);
echo $nome;*/

//Carrega uma lista de usuários
/*$lista = Usuario::getList();
echo json_encode($lista);*/

//Carrega uma lista de usuários buscando pelo login
/*$search = Usuario::search("");
echo json_encode($search);*/

//Carrega um usuário pelo login e senha
/*$usuario = new Usuario();
$usuario->login("N@rsi", "1234567890");
echo $usuario;*/

//Inserir usuário no banco de dados
/*$aluno = new Usuario("Erika", "&rik@");
//$aluno->setNomeLogin("Aluno");	Após criação do método construtor (__construct)
//$aluno->setSenha("@lun0");
$aluno->insert();
echo $aluno;*/

//Update de informações de usuário
/*$usuario = new Usuario();
$usuario->loadById(9);
$usuario->Update("Marcos", "mp@351");
echo $usuario;*/

//Apagando (delete) usuário
$usuario = new Usuario();
$usuario->loadById(6);
$usuario->delete();
echo $usuario;

?>