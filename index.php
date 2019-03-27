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

Carrega um usuário usando o login e a senha
$user=new Usuario();
$user->login("user","!@#$");
echo $user;

Criando um novo usuário
$aluno=new Usuario();
$aluno->insert("aluno","abc123");
echo $aluno;

Alterar um usuário
$user=new Usuario();
$user->update(33,"professor","abc123");
echo $user;

Deletar um usuário*/
$user=new Usuario();
$user->delete(34);
echo $user;
?>