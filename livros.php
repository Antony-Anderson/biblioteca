<?php require 'header.php'; ?>
<?php require './app/livros/excluir.php'; ?>
<?php 
   $query = "SELECT * FROM livros";
   $sql = $pdo->prepare($query);
   $sql->execute();
   $livros = $sql->fetchAll();
  
?>
    <main class="container mt-4">
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
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($livros as $livro): ?>
                <tr>
                    <th scope="row">
                        <?= $livro['id']; ?>
                    </th>
                    <td><?= $livro['titulo']; ?></td> 
                    <td><?= $livro['autor']; ?></td>
                    <td><?= $livro['valor']; ?></td>
                    <td>
                        <button onclick="excluir(<?= $livro['id']; ?>)">excluir</button>
                        <a href="<?= $url?>/editar.php?id=<?= $livro['id']; ?>" class="btn btn-warning">Editar</a>
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
