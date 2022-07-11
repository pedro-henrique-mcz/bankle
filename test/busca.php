<?php
    require_once("..\global\Settings.php");
    require_once("..\dao\PaintingDAO.php");

    $teste = new PaintingDAO($settings->getConn());

    $items = $teste->selectAll();

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
    
    <?php foreach($items as $item): ?>
        <div>
            <?= $item['id'] ?>
        </div>
        <div>
            <?= $item['name'] ?>
        </div>
        <div>
            <?= $item['author'] ?>
        </div>
        <form action="<?= $settings->getUrl()?>/delete.php" method="POST">
            <input type="hidden" name="id" value="<?= $item["id"]?>">
            <input type="submit" value="delete">
        </form>
    <?php endforeach; ?> 

</body>
</html>