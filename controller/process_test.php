<?php
    
    require_once(dirname(__FILE__,2) . "/global/Settings.php");
    require_once(dirname(__FILE__,2) . "/dao/PaintingDAO.php");
    require_once(dirname(__FILE__,2) . "/model/Message.php");

    session_start();
    
    if(!empty($_POST)){
        $data = $_POST;
        $imageFile = $_FILES;
    }
 
    $paintingDAO = new PaintingDAO($settings->getConn());
    
    $message = new Message($settings->getConn());


    //alterações no banco
    if(!empty($data)){

        if($data["type"] === "create"){

            $name = $data["name"];
            $author = $data["author"];
            $description = $data["description"];
            $image = $imageFile["image"];

            if( $name && $author && $description && $image){
                
                $painting = new Painting($name, $author, $description, $image);
                
                $paintingDAO->create($painting);

            }else{

                $message->setMessage("Preencha todos os dados", "error", "back");

            }

        } else if($data["type"] === "edit"){

            $id = $data["id"];
            $name = $data["name"];
            $author = $data["author"];
            $description = $data["description"];
            $image = $imageFile["image"];

            $painting = new Painting($name, $author, $description, $image, "../img/uploads/" , $id);

            $paintingDAO->edit($painting);

        } else if($data["type"] === "delete"){

            $id = $data["id"];

            $painting = new Painting(null, null, null, null, null, $id);

            $paintingDAO->delete($painting);

        }


    }else{

        $id;

        if(!empty($_GET)){
            $id = $_GET["id"];
        }

        if(!empty($id)){

            $painting_search = new Painting(null, null, null, null, null, $id);

            $painting = $paintingDAO->select($painting_search);

        }else{

            $paintings = $paintingDAO->selectAll();

        }

    }
    
    

?>