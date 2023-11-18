<?php
namespace Core;

use PDO;

class Database{
	public $connection;
	public $statement;

	public function __construct($config, $username = 'root', $password = 'Root@123'){

		$dsn = 'mysql:'.http_build_query($config, '', ';');

		$this->connection = new PDO($dsn, $username, $password, [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}
	public function query($query, $prams = []){
		$this->statement = $this->connection->prepare($query);
		$this->statement->execute($prams);

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