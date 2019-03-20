<?php
class Usuario{
	private $id;
	private $login;
	private $senha;
	private $dataCad;
	private $tudo=array();
	public function loadById($id){
		$sql=new sql("dbphp7","MSSQLSERVER2012","sa","abc123");
		$r=$sql->select("select * from usuarios where idUser=$id");
		if (count($r)>0){
			$row=$r[0];
			$this->id=$row['idUser'];
			$this->login=$row['loginUser'];
			$this->senha=$row['senhaUser'];
			$row['dataCad']=new DateTime($row['dataCad']);
			$row['dataCad']=$row['dataCad']->format("d/m/Y H:i");
			$this->dataCad=$row['dataCad'];
			$this->tudo=$row;
		}
	}
	public static function getList(){
		$sql=new sql("dbphp7","MSSQLSERVER2012","sa","abc123");
		return $sql->select("select * from usuarios order by loginUser");

	}
	public static function busca($login){
		$sql=new sql("dbphp7","MSSQLSERVER2012","sa","abc123");
		return $sql->select("select * from usuarios where loginUser like '%$login%' order by loginUser");
	}
	public function login($login,$senha){
		$sql=new sql("dbphp7","MSSQLSERVER2012","sa","abc123");
		$r=$sql->select("select * from usuarios where loginUser='$login' and senhaUser='$senha'");
		if (count($r)>0){
			$row=$r[0];
			$this->id=$row['idUser'];
			$this->login=$row['loginUser'];
			$this->senha=$row['senhaUser'];
			$row['dataCad']=new DateTime($row['dataCad']);
			$row['dataCad']=$row['dataCad']->format("d/m/Y H:i");
			$this->dataCad=$row['dataCad'];
			$this->tudo=$row;
		}
		else{
			throw new Exception("Errrrou!");		
		}
	}
	public function __toString(){
		return json_encode($this->tudo);
	}
}
?>