<?php  

require_once("config.php");
/*$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM tbUsuarios");

echo json_encode($usuarios);*/

$nome = new Usuario();
$nome->loadById(4);

echo $nome;

?>