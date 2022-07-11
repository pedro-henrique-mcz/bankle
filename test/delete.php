
<?php
    require_once("..\global\Settings.php");
    require_once("..\dao\PaintingDAO.php");

    $teste = new PaintingDAO($settings->getConn());

    $painting = new Painting();

    $painting->setId($_POST["id"]);

    $teste->delete($painting);

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
    
</body>
</html>