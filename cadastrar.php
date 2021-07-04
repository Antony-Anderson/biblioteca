<?php require 'header.php'; ?>
<?php 
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
    $cadastrar = false;
    $erroValor = false;
    if($validar){
        try{
            $query = "INSERT INTO livros (titulo, autor, valor) VALUES ('{$titulo}', '{$autor}', {$valor})";
            $sql = $pdo->prepare($query);
            $sql->execute();
            $cadastrar = true;
        } catch(PDOException $e) {
            $erroValor = true;
        }
    }
?>
    <main class="container mt-4">
        <?php if($cadastrar){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Livro cadastrado com sucesso!
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
                <input type="text" class="form-control" id="tituloInput" aria-describedby="emailHelp" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="autorInput" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autorInput" name="autor" required>
            </div>
            <div class="mb-3">
                <label for="valorInput" class="form-label">Valor</label>      
                <input type="text" class="form-control" id="valorInput" name="valor" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </main>
<?php require 'footer.php'; ?>