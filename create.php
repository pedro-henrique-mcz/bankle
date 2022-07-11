<?php
    require_once("templates/header.php");
?>
    <div class="form form-container">
        <h2 class="subtitle">Adicionar</h2>
        <form action="<?= $settings->getUrl() ?>/controller/process_test.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="type" value="create">
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
<?php
    require_once("templates/footer.php");
?>