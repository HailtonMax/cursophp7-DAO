<?php 

class Usuario {

//criacao das variaveis
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

//criacao dos get e set
	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}


//funcao para leitura do argumento selecionado
	public function loadById($id){

		$sql = new SQL();

		$results = $sql->select("select *from tb_usuarios where idusuario = :ID", array(

			":ID"=>$id

		));

		if (count($results)>0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
						

		}
	}
//funcao para apresentacao de uma lista de argumentos selecionados no BD
	public static function getList(){

		$sql= new SQL();

		return $sql->select("select * from tb_usuarios order by deslogin");

	}

	public static function search($login){

		$sql = new SQL();
		return $sql->select("select *from tb_usuarios where deslogin like :SEARCH order by deslogin", array(

			':SEARCH'=>"%".$login."%"

		));

	}

	public function login($login, $password){
		$sql = new SQL();

		$results = $sql->select("select * from tb_usuarios where deslogin  = :LOGIN and dessenha = :PASSWORD", array(

			":LOGIN"=>$login,
			":PASSWORD"=>$password

		));

		if (count($results)>0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

	}else {

		throw new Exception("Login e/ou senha inválidos.");
		

	}

}

//funcao para apresentacao do argumento
	public function __toString(){

		return json_encode(array(

			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"desenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

		));

	}
}

 ?>