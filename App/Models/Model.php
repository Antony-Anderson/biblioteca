<?php
      

require_once autoLoad("App/DataBase.php");

abstract class Model extends DataBase{
	protected $tabela;
	protected $id;


	public function __construct($tabela){
		parent::__construct();
		$this->tabela = $tabela;
	}

	protected function find($id){
		$query = "SELECT * FROM {$this->tabela} WHERE id = {$id}";
		$sql = $this->execute($query);
		$dados = $sql->fetchAll();
		if(count($dados) > 0){
			return $dados[0];
		}else{
			return null;
		} 
	}		

	public function create($request){
		try{
            $query = "INSERT INTO {$this->tabela} {$this->getCreateSubQuery($request)}";
            $this->execute($query);
            return true;
        } catch(PDOException $e) {
            return false;
        }
	}

	public function delete(){
		try{
            $query = "DELETE FROM {$this->tabela} WHERE id = {$this->id}";
            $this->execute($query);
            return true;
        } catch(PDOException $e) {
            return false;
        }
	}

	public function update($request){
		 try{
            $query = "UPDATE {$this->tabela} SET {$this->getUpdateSubQuery($request)} WHERE id = {$this->id}";
            $this->execute($query);
            $dado = $this->find($this->id);
            $this->setDados($dado);
            return true;
        } catch(PDOException $e) {
            return false;
        }

	}

	private function getUpdateSubQuery($request){
		$subQuery = null;
		foreach($request as $key => $item){
			if($subQuery != null){
				$subQuery = "{$subQuery},";
			}
			if(is_numeric($item)){
				$subQuery = "{$subQuery} {$key} = {$item} ";
			}elseif(is_string($item)){
				$subQuery = "{$subQuery} {$key} = '{$item}' ";
			}
		}
		return $subQuery;
	}

	public function getCreateSubQuery($request){
		$query = '(';
		$c = 1;
		foreach($request as $key => $item){	
			$query = $query. Model::aplicarVirgula($c).' '. $key;
			$c++;
		}
		$query = $query. ') VALUES (';
		$c = 1;
		foreach($request as $key => $item){
			if(is_numeric($item)){
				$query = "{$query}". Model::aplicarVirgula($c). " {$item}";
			}elseif(is_string($item)){
				$query = "{$query}". Model::aplicarVirgula($c). " '{$item}'";
			}
			$c++;
		}
		$query = $query. ')';
		return $query;
	}
	public static function aplicarVirgula($count){
		if($count > 1){
			return ',';
		}
		return null;
	}
}
