<?php
class Usuario{
	private $id;
	private $login;
	private $senha;
	private $dataCad;
	private $tudo=array();
	public function loadById($id){
		$sql=new sql("dbphp7","MSSQLSERVER2012","sa","abc123");
		$r=$sql->select("select * from usuarios where idUser=:ID",array(":ID"=>$id));
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
	public function __toString(){
		return json_encode($this->tudo);
	}
}
?>