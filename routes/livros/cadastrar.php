<?php   
    require '../../header.php';
    require "../../App/Http/Controllers/LivroController.php";
    $response = ["codigo" => 0];
    if(!empty($_POST)){
         $request = [
            "autor" => $_POST['autor'],
            "titulo" => $_POST['titulo'],
            "valor" => $_POST['valor']
        ];
        $livroController = new LivroController();
        $response = $livroController->store($request);
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
                <input type="text" class="form-control" id="tituloInput" aria-describedby="emailHelp" name="titulo" >
            </div>
            <div class="mb-3">
                <label for="autorInput" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autorInput" name="autor" >
            </div>
            <div class="mb-3">
                <label for="valorInput" class="form-label">Valor</label>      
                <input type="text" class="form-control" id="valorInput" name="valor" >
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </main>
<?php require '../../footer.php'; ?>