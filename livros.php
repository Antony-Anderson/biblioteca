<?php 
    require 'header.php';
    require 'routes/livros/excluir.php'; 
    require_once "App/Models/Livro.php";
    $livros = new livro();
    $livros = $livros->getAll();
?>
    <main class="container mt-4">
        <div class="mb-4">
            <a class="btn btn-primary" href="<?= $url ?>/routes/livros/cadastrar.php">Novo</a>
        </div>
        <?php if($excluiu){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Livro deletado com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <table class="table" id="tabela">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Valor</th>
                    <th scope="col" style="text-align: right">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($livros as $livro): ?>
                    <th scope="row">
                        <?= $livro['id']; ?>
                    </th>
                    <td><?= $livro['titulo']; ?></td> 
                    <td><?= $livro['autor']; ?></td>
                    <td><?= $livro['valor']; ?></td>
                    <td style="text-align: right">
                        <button onclick="excluir(<?= $livro['id']; ?>)" class="btn btn-danger">excluir</button>
                        <a href="<?= $url?>/routes/livros/editar.php?id=<?= $livro['id']; ?>" class="btn btn-warning">Editar</a>
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
            if(confirm('Deseja excluir este livro?')){
                let input = document.getElementById('excluirLivroInput');
                input.value = id;
                document.getElementById('excluirLivro').submit();
            }
        }
    </script>
<?php require 'footer.php'; ?>


