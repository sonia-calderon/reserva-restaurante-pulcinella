<?php
class Conexion extends PDO{
    private $host = "localhost";
    private $db = "reserva_restaurante_pulcinella";
    private $user = "root";
    private $pass = "";
    private $type = "mysql";

    public function __construct(){
        try{
            parent:: __construct("$this->type:dbname=$this->db;host=$this->host",$this->user, $this->pass);
        }
        catch(PDOExeption $e){
            echo "no se ha conectado". $e->getMessage();
        }
    }
}
?>