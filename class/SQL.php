<?php 

class SQL extends PDO{

	private $conn;

	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost; dbname=dbphp7", "root", "rede01");

	}

	private function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value) {
			$this->setParam($statement,$key, $value);

		}
	}

	private function setParam($statement, $key, $value){

		$statement->bindParam($key, $value);
	}


	public function query($rawQuery, $parameters = array()){

		$statement = $this->conn->prepare($rawQuery);

		$this->setParams($statement, $parameters);

		$statement->execute();

		return $statement;
		
	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}



}


 ?>