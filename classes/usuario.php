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
			$this->setData($r[0]);
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
			$this->setData($r[0]);
		}
		else{
			throw new Exception("Errrrou!");		
		}
	}
	public function setData($row){
		$this->id=$row['idUser'];
		$this->login=$row['loginUser'];
		$this->senha=$row['senhaUser'];
		$row['dataCad']=new DateTime($row['dataCad']);
		$row['dataCad']=$row['dataCad']->format("d/m/Y H:i");
		$this->dataCad=$row['dataCad'];
		$this->tudo=$row;
	}
	public function insert($login,$senha){
		$sql=new sql("dbphp7","MSSQLSERVER2012","sa","abc123");
		$r=$sql->select("exec pi_usuarios '$login','$senha'");
		if (isset($r)){
			$this->setData($r[0]);
		}
		else{
			$this->setData(array('idUser'=>0,'loginUser'=>"",'senhaUser'=>"",'dataCad'=>""));
		}
	}
	public function update($id,$login,$senha){
		$this->loadById($id);
		$sql=new sql("dbphp7","MSSQLSERVER2012","sa","abc123");
		$sql->query("update usuarios set loginUser='$login',senhaUser='$senha' where idUser=$this->id");
	}
	public function delete($id){
		$sql=new sql("dbphp7","MSSQLSERVER2012","sa","abc123");
		$sql->query("delete usuarios where idUser=$id");
		$this->setData(array('idUser'=>0,'loginUser'=>"",'senhaUser'=>"",'dataCad'=>""));
	}
	public function __toString(){
		return json_encode($this->tudo);
	}
}
?>