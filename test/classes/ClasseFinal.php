<?php 

    require_once(dirname(__FILE__,3). "/global/Settings.php");   

    class ClasseFinal {

        private $image;
        private $imageNewName;
        private $extencion;
        private $directory;

        public function __construct($image, $directory){

            $this->directory = $directory;

            $this->extencion = explode(".", $image["name"]);
            $this->extencion = $this->extencion[1];

            $this->imageNewName = md5(time()) . "." . $this->extencion;

            move_uploaded_file($image["tmp_name"], $this->directory.$this->imageNewName);

        }

        public function getImage(){
            return $this->image;
        }

        public function setImage($image){
            $this->image = $image;
        }

        public function getImageNewName(){
            return $this->imageNewName;
        }

        public function setImageNewName($imageNewName){
            $this->imageNewName = $imageNewName;
        }

        public function getExtencion(){
            return $this->extencion;
        }

        public function setExtencion($extencion){
            $this->extencion = $extencion;
        }

        public function getDirectory(){
            return $this->directory;
        }

        public function setDirectory($directory){
            $this->directory = $directory;
        }

    }

    class SuperClasse {

        private $object;
        private $image;
        private $directory;

        public function __construct($image, $directory){

            $this->object = new ClasseFinal($image, $directory);
            
        }

        public function getObject(){
            return $this->object;
        }

    }


    if(!empty($_FILES)){

        $image = $_FILES["image"];

        $teste = new SuperClasse($image, "../");

        echo $teste->getObject()->getImageNewName();

    }

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
    <form action="<?= $settings->getUrl()?>/ClasseFinal.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" value="text">
        <input type="submit" value="enviar">
    </form>
</body>
</html>