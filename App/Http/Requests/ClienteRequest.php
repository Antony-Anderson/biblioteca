<?php

class ClienteRequest{
	private $nome;
	private $cpf;
	private $dataDeNascimento;
	private $erros;

	public function __construct($request){
		$this->setDados($request); 
	}

	public function setDados($dados){
		$this->nome = $dados["nome"];
		$this->cpf = $dados["cpf"];
		$this->dataDeNascimento = $dados["dataDeNascimento"];
	}

	public function validate(){
		if(!$this->validNome()){
			return false;
		}
		if(!$this->validCpf()){
			return false;
		}
		if(!$this->validDataDeNascimento()){
			return false;
		}
		return true;
	}

	public function getErros(){
		return $this->erros;
	}

	public function validNome(){
		if(empty($this->nome)){
			$this->erros["nome"] = "O campo nome é obrigatório!";
			return false;
		}
		if(strlen($this->nome) <= 3){
			$this->erros["nome"] = "Nome tem que ter mais de 3 digitos!";
			return false;
		}
		return true;
	}
	public function validCpf(){
		if(empty($this->cpf)){
			$this->erros["cpf"] = "O campo cpf é obrigatório!";
			return false;
		}
		return true;
	}
	public function validDataDeNascimento(){
		if(empty($this->dataDeNascimento)){
			$this->erros["dataDeNascimento"] = "O campo data de nascimento é obrigatório!";
			return false;
		}
		if($this->dataDeNascimento <= 0){
			$this->erros["dataDeNascimento"] = "O campo data de nascimento é tem que ser maior que 0!";
			return false;
		}
		return true;
	}
}