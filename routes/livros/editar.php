<?php 
    
    require_once "../../header.php";
    require_once autoLoad("App/Http/Controllers/LivroController.php");


    $id = 0;
    $livro = [];
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
    } else{
        header('Location: ../index.php');
    } 

    $response = ["codigo" => 0];
    $livroController = new LivroController();
    $livro = $livroController->show($id);
    if(empty($livro->getId())){
        header('Location: ../404.php');
    }
    if(!empty($_POST)){
         $request = [
            "autor" => $_POST['autor'],
            "titulo" => $_POST['titulo'],
            "valor" => $_POST['valor']
        ];
        $response = $livroController->update($request, $livro);
    }
?>
    <main class="container mt-4">
        <?php if($response["codigo"] == 200){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $response["mensagem"]; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <?php 
            if($response["codigo"] == 406 && count($response["dados"]) > 0):
                foreach ($response["dados"] as $erro) :
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
                <label for="tituloInput" class="form-label">Título</label>
                <input type="text" class="form-control" id="tituloInput" aria-describedby="emailHelp" name="titulo"  value="<?= $livro->getTitulo(); ?>">
            </div>
            <div class="mb-3">
                <label for="autorInput" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autorInput" name="autor" value="<?= $livro->getAutor(); ?>">
            </div>
            <div class="mb-3">
                <label for="valorInput" class="form-label">Valor</label>
                <input type="text" class="form-control" id="valorInput" name="valor" value="<?= $livro->getValor(); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </main>
<?php require '../../footer.php'; ?>