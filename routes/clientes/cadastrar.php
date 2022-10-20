<?php   
    require '../../header.php';
    require_once "../../App/Models/Cliente.php";
    require_once "../../App/Http/Requests/ClienteRequest.php";

    $cadastrar = false;
    $erros = [];
    if(!empty($_POST)){
         $request = [
            "nome" => $_POST['nome'],
            "cpf" => $_POST['cpf'],
            "dataDeNascimento" => $_POST['dataDeNascimento']
        ];
        $clienteRequest = new ClienteRequest($request);
        if($clienteRequest->validate()){
            $cliente = new Cliente();
            $cadastrar = $cliente->create($request);
        } else{
            $erros = $clienteRequest->getErros();
        }

    }
?>
    <main class="container mt-4">
        <?php if($cadastrar){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Cliente cadastrado com sucesso!
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
                <input type="text" class="form-control" id="nomeInput" aria-describedby="emailHelp" name="nome" >
            </div>
            <div class="mb-3">
                <label for="cpfInput" class="form-label">Cpf</label>
                <input type="text" class="form-control" id="cpfInput" name="cpf" >
            </div>
            <div class="mb-3">
                <label for="dataDeNascimentoInput" class="form-label">Data de nascimento</label>      
                <input type="text" class="form-control" id="dataDeNascimentoInput" name="dataDeNascimento" >
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </main>
<?php require '../../footer.php'; ?>