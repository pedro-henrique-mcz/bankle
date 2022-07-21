<?php 
    
    include_once("controller/process_test.php");

    $message = new Message($settings->getUrl());

    $flashMessage = $message->getMessage();

    if(!empty($flashMessage["msg"])){
        $message->clearMessage();
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="<?= $settings->getUrl() ?>/css/reset.css">
    <link rel="stylesheet" href="<?= $settings->getUrl() ?>/css/style.css">
    <!--Typography-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Bankle</title>
</head>
<body>
    <header class="header">
        <div class="inner_header">
            <div class="logo_container">
                <h1 class="logo"><a href="<?= $settings->getUrl() ?>/index.php">Bankle</a></h1>
            </div>
            
            <ul class="navigation">
                <a href="#"><li>Logar</li></a>
                <a href="#"><li>Cadastrar</li></a>
                <a href="<?= $settings->getUrl() ?>/create.php"><li><span class="btn-add">Adicionar</span> </li></a>
            </ul>
        </div>
        <?php if(isset($msg) && ($msg != "")):?>
            <div class="sub-header">
                <div class="inner-sub-header">
                    <p><?= $msg ?></p>
                </div>
            </div>
        <?php endif; ?>
    </header>
    <div class="mensage-container">
        <p><?= $flashMessage["msg"] ?></p>
    </div>
    <div id="wrapper">
        <div class="body-content">

        