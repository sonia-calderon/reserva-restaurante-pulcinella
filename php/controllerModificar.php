<?php
    include "classConexion.php";
    include "classCliente.php";

    $conex = new Conexion();
    $client = new Cliente();
    
    $client->modificarReserva($_POST["date"], $_POST["time"], $_POST["uniqueId"], $conex);
?>