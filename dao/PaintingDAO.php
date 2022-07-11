<?php 

    require_once(dirname(__FILE__,2). "/model/Painting.php");

    class PaintingDAO implements PaintingDAOInterface {

        private $conn;

        public function __construct(PDO $conn){
            $this->conn = $conn;
        }

        public function create(Painting $painting){

            $stmt = $this->conn->prepare("INSERT INTO painting (name, author, description, image) VALUES (:name, :author, :description, :image)");

            $stmt->bindValue(":name", $painting->getName());
            $stmt->bindValue(":author", $painting->getAuthor());
            $stmt->bindValue(":description", $painting->getDescription());
            $stmt->bindValue(":image", $painting->getImage());

            $stmt->execute();

        }


        public function edit(Painting $painting){

            $stmt = $this->conn->prepare("UPDATE painting SET name = :name, author = :author, description = :description, image = :image WHERE id = :id");
            
            $stmt->bindValue(":id", $painting->getId());
            $stmt->bindValue(":name", $painting->getName());
            $stmt->bindValue(":author", $painting->getAuthor());
            $stmt->bindValue(":description", $painting->getDescription());
            $stmt->bindValue(":image", $painting->getImage());

            $stmt->execute();

        }
        
        public function delete(Painting $painting){

            $stmt = $this->conn->prepare("DELETE FROM painting WHERE id=:id");

            $stmt->bindValue(":id", $painting->getId());

            $stmt->execute();

        }
        
        public function select(Painting $painting){

            $stmt = $this->conn->prepare("SELECT * FROM painting WHERE id = :id");

            $stmt->bindValue(":id", $painting->getId());

            $stmt->execute();

            $item = $stmt->fetch();

            return $item;

        }

        public function selectAll(){

            $items = [];

            $stmt = $this->conn->prepare("SELECT * FROM painting");

            $stmt ->execute();

            return $items = $stmt->fetchAll();

        }


    }