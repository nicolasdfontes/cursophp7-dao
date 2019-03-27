<?php
class Sql extends PDO{
	private $conn;
	public function __construct($db,$server,$login,$senha){
		$this->conn=new PDO("sqlsrv:Database=$db;server=localhost".DIRECTORY_SEPARATOR."$server;ConnectionPooling=0",$login,$senha);
	}
	public function query($rawQuery,$params=array()){
		$stmt=$this->conn->prepare($rawQuery);
		foreach ($params as $key => $value) {
			$stmt->bindParam($key,$value);
		}
		$stmt->execute();
		return $stmt;
	}
	/*Funções inúteis
	private function setParams($statement,$parameters=array()){
		foreach ($parameters as $key => $value) {
			setParam($statement,$key,$value);
		}
	}
	private function setParam($statement,$key,$value){
		$statement->bindParam($key,$value);
	}*/
	public function select($rawQuery,$params=array()):array{
		$stmt=$this->query($rawQuery,$params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>