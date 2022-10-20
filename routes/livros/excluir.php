<?php
    require_once autoLoad("App/Http/Controllers/LivroController.php");
    $excluiu = false;
    if(isset($_POST['id'])){
        $livroController = new LivroController();
        $id = $_POST['id'];
        $livro = $livroController->show($id);
        $excluiu = $livroController->destroy($livro);
    } 
?>
<form method="post" id="excluirLivro">
    <input type="text" name="id" id="excluirLivroInput" style="visibility: hidden;">
</form>