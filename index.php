<?php
require_once("config.php");
/*$sql=new Sql("dbphp7","MSSQLSERVER2012","sa","abc123");
echo json_encode($sql->select("select * from usuarios"));*/
$jose=new Usuario();
$jose->loadById(3);
echo $jose;
?>