<?php

abstract class Controller{

	protected function response($mensagem, $codigo, $dados = null){
		return [
			"mensagem" => $mensagem,
			"codigo" => $codigo,
			"dados" => $dados
		];
	}
}