<?php
abstract class DataBase{
	protected $pdo;

	public function __construct(){
		try {
			$this->pdo = new PDO("mysql:dbname=biblioteca;host=localhost", "root", "");
		} catch(PDOException $e) {
			echo "Erro: ".$e->getMessage();
		}

	}
	public static function pdoStatic(){
		try {
			$pdo = new PDO("mysql:dbname=biblioteca;host=localhost", "root", "");
			return $pdo;
		} catch(PDOException $e) {
			return "Erro: ".$e->getMessage();
		}
	}

	public function execute($query){
		$sql = $this->pdo->prepare($query);
        $sql->execute();
        return $sql;
	}
}