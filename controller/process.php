<?php
    
    require_once(dirname(__FILE__,2) . "/global/Settings.php");

    session_start();
    
    $data = $_POST;
    
    //create   
    if(!empty($data)){
      
      //se o formulário foi preenchido, significa que a imagem também foi logo:

      $imageFile = $_FILES['image'];
      $directory = "../img/uploads/";
        
      if($data["type"] === "create"){
        
        //TRATAMENTO DE IMAGE ABAIXO

        //primeiro pegamos a sua extenção 
        $extencionImage = strtolower(explode(".",$imageFile["name"]));
        //agora damos um novo nome único a imagem para ser resgatada no banco de dados
        $imageNewName = md5(time()) . $extencionImage;
        //movendo a imagem captada para o diretoria dito, com um novo nome 
        move_uploaded_file($imageFile["tmp_name"], $directory.$imageNewName);

        $name = $data["name"];
        $author = $data["author"];
        $description = $data["description"];
        $image = $imageNewName;
        //esta ficando mais complexo do que deveria 
        $stmt = $settings->getConn()->prepare("INSERT INTO painting (name, author, description, image) VALUES (:name, :author, :description, :image)");

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":image", $image);
        try {

            $stmt->execute();
            $_SESSION["msg"] = "Obra adicionada com sucesso";
        
          } catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
          }

      }else if ($data["type"] === "edit") {

        //tratamento de imagem 

        //primeiro pegamos a sua extenção 
        $extencionImage = strtolower(explode(".",$imageFile["name"]));
        //agora damos um novo nome único a imagem para ser resgatada no banco de dados
        $imageNewName = md5(time()) . $extencionImage;
        //movendo a imagem captada para o diretoria dito, com um novo nome 
        move_uploaded_file($imageFile["tmp_name"], $directory.$imageNewName);

        $id = $data["id"];
        $name = $data["name"];
        $author = $data["author"];
        $description = $data["description"];
        $image = $imageNewName;
        //esta ficando mais complexo do que deveria 
        $stmt = $settings->getConn()->prepare("UPDATE painting SET name = :name, author = :author, description = :description, image = :image WHERE id = :id");

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":author", $author);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":image", $image);

        try {

          $stmt->execute();
          $_SESSION["msg"] = "Obra Alterada";

        } catch(PDOException $e) {
          // erro na conexão
          $error = $e->getMessage();
          echo "Erro: $error";
        }

      }else if($data['type'] === "delete"){

        $id = $data["id"];

        $stmt = $settings->getConn()->prepare("DELETE FROM painting WHERE id =:id");

        $stmt->bindParam(":id", $id);

        try {

          $stmt->execute();
          $_SESSION["msg"] = "Obra Deletada";
      
        } catch(PDOException $e) {
          // erro na conexão
          $error = $e->getMessage();
          echo "Erro: $error";
        }
      
      }
  
    header("Location:" . dirname($settings->getUrl()). "/index.php");

  } else {

      $id;

      if(!empty($_GET)){
        $id = $_GET["id"];
      }

      if(!empty($id)){
        $stmt = $settings->getConn()->prepare("SELECT * FROM painting WHERE id = :id");

        $stmt->bindParam(":id", $id);

        try {

          $stmt->execute();
      
        } catch(PDOException $e) {
          // erro na conexão
          $error = $e->getMessage();
          echo "Erro: $error";
        }

        $painting = $stmt->fetch();

      } else {

        $paintings = [];

        $stmt = $settings->getConn()->prepare("SELECT * FROM painting");

        $stmt->execute();

        $paintings = $stmt->fetchAll();


      }

    }

    
    

?>