<?php
    include "classConexion.php";
    include "classCliente.php";

    $conex = new Conexion();
    $client = new Cliente();
    
    $datos = [$_POST["name"], $_POST["lastname"], $_POST["email"], $_POST["numPeople"], $_POST["date"], $_POST["time"], $_POST["uniqueId"]];
    $client->reservar($datos, $conex);
?>