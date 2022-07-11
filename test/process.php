<?php 

    require_once(dirname(__FILE__,2) . "/global/Settings.php");
    require_once(dirname(__FILE__,2) . "/dao/PaintingDAO.php");

    //começe a conexão de dados 
    $paintingDAO = new PaintingDAO($settings->getConn());

    //todos os dados que serão tratados aqui no back-end 
    $painting = new Painting;

    $painting->setId($_POST["id"]);
    $painting->setName($_POST["name"]);
    $painting->setAuthor($_POST["author"]);
    $painting->setDescription($_POST["description"]);
    $painting->setImage($_FILES["image"]);

    $paintingDAO->delete($painting);