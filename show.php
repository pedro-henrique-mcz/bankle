<?php
    require_once("templates/header.php");
?>
    <?= $painting["id"] ?>    
    <h1><?= $painting["name"] ?></h1>
    <form action="<?= $settings->getUrl()?>/controller/process_test.php" method="post">
        <input type="hidden" name="type" value="delete">
        <input type="hidden" name="id" value="<?= $painting["id"] ?>">
        <input type="submit" value="deletar">
    </form>
<?php
    require_once("templates/footer.php");
?>

