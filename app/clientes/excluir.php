<?php
    function excluir($id){
        global $pdo;
        try{
            $query = "DELETE FROM clientes WHERE id = {$id}";
            $sql = $pdo->prepare($query);
            $sql->execute();
            return [
                'mensagem' => 'Cliente deletado com sucesso!',
                'class' => 'alert alert-success alert-dismissible fade show'
            ];
        } catch(PDOException $e) {
            return [
                'mensagem' => 'Você não pode excluir esse cliente!',
                'class' => 'alert alert-danger alert-dismissible fade show'
            ];
        }
    }
    $mensagemExcluiu = null;
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $mensagemExcluiu = excluir($id);
    } 
?>
<form method="post" id="excluirCliente">
    <input type="text" name="id" id="excluirClienteInput" style="visibility: hidden;">
</form>