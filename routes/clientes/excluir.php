<?php
    require_once './app/Models/Cliente.php';

    $excluiuClie = false;
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $cliente = new Cliente($id);
        $excluiuClie = $cliente->delete();
    } 
?>
<form method="post" id="excluirCliente">
    <input type="text" name="id" id="excluirClienteInput" style="visibility: hidden;">
</form>