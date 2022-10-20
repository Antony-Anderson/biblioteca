<?php 
    require 'header.php'; 
    require './routes/clientes/excluir.php'; 
    require_once "App/Models/Cliente.php";
    $clientes = new Cliente();
    $clientes = $clientes->getAll();

?>
    <main class="container mt-4">
        <div class="mb-4">
            <a class="btn btn-primary" href="<?= $url ?>/routes/clientes/cadastrar.php">Novo</a>
        </div>
        <?php if($excluiuClie){ 
            echo "Hello wolrd";
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Cliente deletado com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <table class="table" id="tabela">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Data de nascimento</th>
                    <th scope="col" style="text-align: right">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($clientes as $cliente): ?>
                    <th scope="row">
                        <?= $cliente['id']; ?>
                    </th>
                    <td><?= $cliente['nome']; ?></td> 
                    <td><?= $cliente['cpf']; ?></td>
                    <td><?= $cliente['dataDeNascimento']; ?></td>
                    <td style="text-align: right">
                        <button onclick="excluir(<?= $cliente['id']; ?>)" class="btn btn-danger">excluir</button>
                        <a href="<?= $url?>/routes/clientes/editar.php?id=<?= $cliente['id']; ?>" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <script>
        $(document).ready( function () {
            $('#tabela').DataTable();
        } );

        function excluir(id){
            console.log(id)
            if(confirm('Deseja excluir este cliente?')){
                let input = document.getElementById('excluirClienteInput');
                input.value = id;
                document.getElementById('excluirCliente').submit();
            }
        }
    </script>
<?php require 'footer.php'; ?>


