<?php

require_once autoLoad("App/Http/Controllers/Controller.php");
require_once autoLoad("App/Http/Requests/LivroRequest.php");
require_once autoLoad("App/Models/Livro.php");

class LivroController extends Controller{



	public function store($request){
		$livroRequest = new LivroRequest($request);


        if(!$livroRequest->validate()){
        	$erros = $livroRequest->getErros();
            return $this->response("Não foi possivel cadastrar o livro!", 406, $erros); 
        }

        $livro = new Livro();
        $cadastrado = $livro->create($request);
       if($cadastrado){
        	return $this->response("Livro cadastrado com sucesso!", 200);
       } else{
        	return $this->response("Não foi possivel cadastrar o livro!", 500);
       }     
	}

    public function update($request, Livro $livro){
        $livroRequest = new LivroRequest($request);


        if(!$livroRequest->validate()){
            $erros = $livroRequest->getErros();
            return $this->response("Não foi possivel editar o livro!", 406, $erros); 
        }

        $editado = $livro->update($request);
       if($editado){
            return $this->response("Livro editado com sucesso!", 200);
       } else{
            return $this->response("Não foi possivel editar o livro!", 500);
       }     
    }


    public function show($id){
        $livro = new Livro($id);
        return $livro;
    }

    public function destroy(Livro $livro){
        return $livro->delete();
    }



}