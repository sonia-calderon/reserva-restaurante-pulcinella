<?php
    include "classConexion.php";
    include "classCliente.php";

    $conex = new Conexion();
    $client = new Cliente();
    
    $client->cancelarReserva(1, $_GET["uniqueId"], $conex);
   
?>