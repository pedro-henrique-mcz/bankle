<?php

    include_once("ClasseFinal.php");

    class SuperClasse {

        private $object;
        private $image;
        private $directory;

        public function __construct($image, $directory){

            $this->object = new ClasseFinal($image, $directory);
            
        }

    }