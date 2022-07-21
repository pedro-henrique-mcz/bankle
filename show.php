<?php
    require_once("templates/header.php");
?>
    <img src="<?= $settings->getUrl()?>/img/uploads/<?= $painting["image"]?>" alt="<?= $painting["name"]?>">
    <h1><?= $painting["name"] ?></h1>
    <h2><?= $painting["author"] ?></h2>
    <p><?= $painting["description"]?></p>
    <form action="<?= $settings->getUrl()?>/controller/process_test.php" method="post">
        <input type="hidden" name="type" value="delete">
        <input type="hidden" name="id" value="<?= $painting["id"] ?>">
        <input type="submit" value="deletar">
    </form>
    <a href="<?= $settings->getUrl()?>/edit.php?id=<?= $painting["id"]?>">Editar</a>
<?php
    require_once("templates/footer.php");
?>

