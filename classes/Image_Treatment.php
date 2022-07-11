<?php

    class Image_Treatment {

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