<?php require 'header.php'; ?>
<?php require './app/clientes/excluir.php'; ?>
<?php 
   $query = "SELECT * FROM clientes";
   $sql = $pdo->prepare($query);
   $sql->execute();
   $clientes = $sql->fetchAll();
?>
    <main class="container mt-4">
        <?php if(!empty($mensagemExcluiu)){ ?>
            <div class="<?= $mensagemExcluiu['class']; ?>" role="alert">
                <?= $mensagemExcluiu['mensagem']; ?>
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
                        <a href="<?= $url?>/editar.php?id=<?= $cliente['id']; ?>" class="btn btn-warning">Editar</a>
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


