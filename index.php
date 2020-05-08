<?php 

require_once ("config.php");

//carrega um usuario
//$root = new Usuario();
//$root->loadbyid(2);
//echo $root;

//carrega uma lista de usuarios

//$lista = Usuario::getList();

//echo json_encode($lista);

//carrega uma lista de usuarios buscando pelo login

//$search = Usuario::search("h");

//echo json_encode($search);

//carrega o usuario pelo login e senha

//$usuario = new Usuario();
//$usuario->login("Heloisa","3456");

//criando um novo usuario

//echo ($usuario);
//$aluno = new Usuario("aluno", "@luno");

//$aluno->insert();

//echo $aluno;

//instanciando um usuario
$usuario=new Usuario();

//carregando o usuario determinado
$usuario->loadById(12);

//alterando o usuario escolhido
$usuario->update("Helena", "aff");

echo $usuario;
 ?>