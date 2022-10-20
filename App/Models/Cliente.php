<?php

require_once "Model.php";

class Cliente extends Model{
	
	private $nome;
	private $cpf;
	private $dataDeNascimento;

	public function __construct($id = null){
		parent::__construct("clientes");
		if(!empty($id)){
			$dados = $this->find($id);
			if(!empty($dados)){
				$this->setDados($dados);
			}	
		}
	}

	public function setDados($dados){
		$this->id = $dados["id"];
		$this->nome = $dados["nome"];
		$this->cpf = $dados["cpf"];
		$this->dataDeNascimento = $dados["dataDeNascimento"];
	}

	public function getAll(){
		$query = "SELECT * FROM clientes";
		$sql = $this->pdo->prepare($query);
		$sql->execute();
		$clientes = $sql->fetchAll();
		return $clientes;
	}

	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function getDataDeNascimento(){
		return $this->dataDeNascimento;
	}

}