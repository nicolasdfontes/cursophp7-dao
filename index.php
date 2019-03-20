<?php
require_once("config.php");
/*Carrega um usuário (id=3)
$jose=new Usuario();
$jose->loadById(3);
echo $jose;

Carrega uma lista de usuários
echo json_encode(Usuario::getList());

Carrega uma lista de usuários bucando pelo login
echo json_encode(Usuario::busca("q"));

Carrega um usuário usando o login e a senha*/
$usuario=new Usuario();
$usuario->login("user","!@#$");
echo $usuario;
?>