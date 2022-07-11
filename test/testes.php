<?php
require_once("..\global\Settings.php");

session_start();

if(!empty($_POST)){
    echo $_POST["description"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="form form-container">
        <h2 class="subtitle">Editar</h2>
        <form action="<?= $settings->getUrl() ?>/process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="type" value="delete">
            <input type="text" name="id">
            <div>
                <label for="name">Obra</label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="author">Autor</label>
                <input type="text" name="author">
            </div>
            <div>
                <label for="description">Descrição</label>
                <textarea class="description" name="description" rows="4" cols="50"></textarea>
            </div> 
            <div>
                <label for="image">Imagem</label>
                <input type="file" for="image" name="image">
            </div>     
            <input type="submit" id="btn-submit" value="Enviar">
        </form>
    </div>
</body>
</html>