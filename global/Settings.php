<?php 
    //singleton - ajeitar depois
    final class Settings {

        private static Settings $instance;
        private PDO $conn;
        private $base_url;

        private function __construct(){
            $db_host = "localhost";
            $db_database = "new_bankle";
            $db_user= "root";
            $db_pass = "";
            $db_driver = "mysql";
            
            try{
                $this->conn = new PDO("$db_driver:host=$db_host;dbname=$db_database", "$db_user", "$db_pass");
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }catch (PDOException $e){            
                # Parar carregamento da página
                die("Connection Error: " . $e->getMessage());
            }
            
            $this->base_url = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?');
        }

        private function __clone(){

        }

        private function __wakeup(){

        }

        //Getters
        public function getUrl(){
            return $this->base_url;
        }

        public function getConn(){
            return $this->conn;
        }

        //Instancia
        public static function getInstance(): Settings{
            if(!isset(self::$instance)){
                self::$instance = new self;
            }

            return self::$instance;
        }

    }

    $settings = Settings::getInstance();
