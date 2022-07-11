<?php
    require_once("templates/header.php");
?>
    <div class="form form-container">
        <h2 class="subtitle">Editar</h2>
        <form action="<?= $settings->getUrl() ?>/controller/process_test.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $painting["id"] ?>">
            <div>
                <label for="name">Obra</label>
                <input type="text" name="name" value="<?= $painting["name"] ?>">
            </div>
            <div>
                <label for="author">Autor</label>
                <input type="text" name="author" value="<?= $painting["author"] ?>">
            </div>
            <div>
                <label for="description">Descrição</label>
                <textarea class="description" name="description" rows="4" cols="50"><?= $painting["description"] ?></textarea>
            </div>
            <div>
                <label for="image">Imagem</label>
                <input type="file" for="image" name="image" value="<?= $painting["image"] ?>">
            </div>       
            <input type="submit" id="btn-submit" value="Alterar">
        </form>
    </div>
<?php
    require_once("templates/footer.php");
?>