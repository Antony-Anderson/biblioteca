<?php


class LivroRequest{
	private $autor;
	private $titulo;
	private $valor;
	private $erros;

	public function __construct($request){
		$this->setDados($request); 
	}

	public function setDados($dados){
		$this->titulo = $dados["titulo"];
		$this->autor = $dados["autor"];
		$this->valor = $dados["valor"];
	}

	public function validate(){
		if(!$this->validAutor()){
			return false;
		}
		if(!$this->validTitulo()){
			return false;
		}
		if(!$this->validValor()){
			return false;
		}
		return true;
	}

	public function getErros(){
		return $this->erros;
	}

	public function validAutor(){
		if(empty($this->autor)){
			$this->erros["autor"] = "O campo autor é obrigatório!";
			return false;
		}
		if(strlen($this->autor) <= 3){
			$this->erros["autor"] = "Autor tem que ter mais de 3 digitos!";
			return false;
		}
		return true;
	}
	public function validTitulo(){
		if(empty($this->titulo)){
			$this->erros["titulo"] = "O campo titulo é obrigatório!";
			return false;
		}
		if(strlen($this->titulo) <= 3){
			$this->erros["titulo"] = "Titulo tem que ter mais de 3 digitos!";
			return false;
		}
		return true;
	}
	public function validValor(){
		if(empty($this->valor)){
			$this->erros["valor"] = "O campo valor é obrigatório!";
			return false;
		}
		if($this->valor <= 0){
			$this->erros["valor"] = "O campo valor é tem que ser maior que 0!";
			return false;
		}
		return true;
	}
}