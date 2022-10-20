<?php
require_once "Model.php";

class Livro extends Model{
	
	private $titulo;
	private $autor;
	private $valor;

	public function __construct($id = null){
		parent::__construct("livros");
		if(!empty($id)){
			$dados = $this->find($id);
			if(!empty($dados)){
				$this->setDados($dados);
			}	
		}
	}

	public function setDados($dados){
		$this->id = $dados["id"];
		$this->titulo = $dados["titulo"];
		$this->autor = $dados["autor"];
		$this->valor = $dados["valor"];
	}

	public function getAll(){
		$query = "SELECT * FROM livros";
		$sql = $this->pdo->prepare($query);
		$sql->execute();
		$livros = $sql->fetchAll();
		return $livros;
	}

	public function getId(){
		return $this->id;
	}

	public function getAutor(){
		return $this->autor;
	}

	public function getValor(){
		return $this->valor;
	}

	public function getTitulo(){
		return $this->titulo;
	}

}