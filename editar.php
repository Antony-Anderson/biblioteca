<?php require 'header.php'; ?>
<?php
    function pegarLivro($id){
        global $pdo;
        $query = "SELECT * FROM livros WHERE id = {$id}";
        $sql = $pdo->prepare($query);
        $sql->execute();
        if($sql->rowCount() > 0){
            return $sql->fetch();
        } else{
            header('Location: index.php');
        }
    }
    $id = 0;
    $livro = [];
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    } else{
        header('Location: index.php');
    } 
    $validar = true;
    if(isset($_POST['titulo'])){
        $titulo = $_POST['titulo'];
    } else{
        $validar = false;
    }
    if(isset($_POST['autor'])){
        $autor = $_POST['autor'];
    } else{
        $validar = false;
    }
    if(isset($_POST['valor'])){
        $valor = $_POST['valor'];
    } else{
        $validar = false;
    }
    $editar = false;
    $erroValor = false;
    if($validar){
        try{
            $query = "UPDATE livros SET titulo = '{$titulo}', autor = '{$autor}', valor = {$valor} WHERE id = {$id}";
            $sql = $pdo->prepare($query);
            $sql->execute();
            $editar = true;
        } catch(PDOException $e) {
            $erroValor = true;
        }
    }
    $livro = pegarLivro($id);
?>
    <main class="container mt-4">
        <?php if($editar){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Livro editado com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <?php if($erroValor){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Digite um valor válido!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <form method="post">
            <div class="mb-3">
                <label for="tituloInput" class="form-label">Título</label>
                <input type="text" class="form-control" id="tituloInput" aria-describedby="emailHelp" name="titulo" required value="<?= $livro['titulo']; ?>">
            </div>
            <div class="mb-3">
                <label for="autorInput" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autorInput" name="autor" required value="<?= $livro['autor']; ?>">
            </div>
            <div class="mb-3">
                <label for="valorInput" class="form-label">Valor</label>
                <input type="text" class="form-control" id="valorInput" name="valor" required value="<?= $livro['valor']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </main>
<?php require 'footer.php'; ?>