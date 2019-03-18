<?php
require_once("config.php");
$a=new sql("dbphp7","MSSQLSERVER2012","sa","abc123");
echo json_encode($a->select("SELECT * from usuarios"));
?>