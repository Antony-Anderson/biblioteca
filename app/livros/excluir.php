<?php
    function excluir($id){
        global $pdo;
        try{
            $query = "DELETE FROM livros WHERE id = {$id}";
            $sql = $pdo->prepare($query);
            $sql->execute();
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }
    $excluiu = false;
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $excluiu = excluir($id);
    } 
?>
<form method="post" id="excluirLivro">
    <input type="text" name="id" id="excluirLivroInput" style="visibility: hidden;">
</form>