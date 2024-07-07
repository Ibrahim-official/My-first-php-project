<?php
namespace Core;
					//unless you specify otherwise every single class referenced within this file will assume ths namespace
use PDO; 			//Imports the class, otherwise it would squash PDO class with Core namespace

class Database{
	public $connection;
	public $statement;

	public function __construct($config, $username = 'root', $password = ""){

		$dsn = 'mysql:'.http_build_query($config, '', ';');

		$this->connection = new PDO($dsn, $username, $password, [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}
	public function query($query, $params = []){
		$this->statement = $this->connection->prepare($query);
		$this->statement->execute($params);

		return $this;
	}
	public function get(){                 //this is fn of Database class
		return $this->statement->fetchAll();    //this is PDO_Statement
	}

	public function find(){
	return $this->statement->fetch();
	}

	public function findOrFail()
	{
		$result = $this->find();
		if (! $result){
			abort();
		}
		return $result;
	}
}