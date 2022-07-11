<?php 

    require_once(dirname(__FILE__,2) . "/classes/Image_Treatment.php"); 

    class Painting {

        private $id;
        private $name;
        private $author;
        private $description;
        private $image;
        private $directoryImage;

        public function __construct($name, $author, $description, $image, $directoryImage = "../img/uploads/", $id = null){

            if(isset($id)){
                $this->id = $id;
            }
            
            $this->name = $name;
            $this->author = $author;
            $this->description = $description;

            if($image){
                
                $tmp = new Image_Treatment($image, $directoryImage);

                $this->image = $tmp->getImageNewName();

                unset($tmp);

            }

        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getAuthor(){
            return $this->author;
        }

        public function setAuthor($author){
            $this->author = $author;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function getImage(){
            return $this->image;
        }       

    }

    interface PaintingDAOInterface {
        
        public function create(Painting $painting);
        public function edit(Painting $painting);
        public function delete(Painting $painting);
        public function selectAll();

    }