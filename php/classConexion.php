<?php

class Conexion extends PDO{
    private $host = "localhost";
    private $db = "restaurante_italiano";
    private $user = "root";
    private $pass = "";
    private $type = "mysql";

    public function __construct(){
        try{
            parent:: __construct("$this->type:dbname=$this->db;host=$this->host",$this->user, $this->pass);
            //echo "se ha conectado";
        }
        catch(PDOExeption $e){
            echo "no se ha conectado". $e->getMessage();
        }
    }
}

//comprobar que se conecta
//$con = new Conexion(); 

?>