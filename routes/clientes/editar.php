<?php
    require '../../header.php'; 
    require_once "../../App/Models/Cliente.php";
    require_once "../../App/Http/Requests/ClienteRequest.php";

    $id = 0;
    $cliente = [];
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
    } else{
        header('Location: ../index.php');
    } 

    $editar = false;
    $erros = [];
    $cliente = new Cliente($id);
    if(empty($cliente->getId())){
        header('Location: ../404.php');
    }
    if(!empty($_POST)){
         $request = [
            "nome" => $_POST['nome'],
            "cpf" => $_POST['cpf'],
            "dataDeNascimento" => $_POST['dataDeNascimento']
        ];
        $clienteRequest = new ClienteRequest($request);
        if($clienteRequest->validate()){
            $editar = $cliente->update($request);
        } else{
            $erros = $clienteRequest->getErros();
        }
    }
?>

<main class="container mt-4">
        <?php if($editar){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Cliente editado com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <?php 
            if(count($erros) > 0):
                foreach ($erros as $erro) :
        ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $erro; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
        <?php
                endforeach;
            endif;
         ?>
        <form method="post">
            <div class="mb-3">
                <label for="nomeInput" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nomeInput" aria-describedby="emailHelp" name="nome"  value="<?= $cliente->getNome(); ?>">
            </div>
            <div class="mb-3">
                <label for="cpfInput" class="form-label">cpf</label>
                <input type="text" class="form-control" id="cpfInput" name="cpf" value="<?= $cliente->getCpf(); ?>">
            </div>
            <div class="mb-3">
                <label for="dataDeNascimentoInput" class="form-label">dataDeNascimento</label>
                <input type="text" class="form-control" id="dataDeNascimentoInput" name="dataDeNascimento" value="<?= $cliente->getDataDeNascimento(); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </main>
<?php require '../../footer.php'; ?>