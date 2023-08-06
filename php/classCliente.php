<?php
    class Cliente{
        public function reservar($datos, $con){
            $insert = "INSERT INTO reservas (nombre, apellidos, email, numPer, fecha, hora, uniqueId) VALUES (:name, :lastname, :email, :numPeople, :date, :time, :uniqueId)";
            $insertClient = $con->prepare($insert);
            $insertClient->execute(array(":name"=>$datos[0], ":lastname"=>$datos[1], ":email"=>$datos[2], ":numPeople"=>$datos[3], ":date"=>$datos[4], ":time"=>$datos[5], ":uniqueId"=>$datos[6]));
            //echo "Se ha reservado con éxito";
            var_dump($_POST);
        }

        public function selectReservaId($id, $con){
            $sql = "SELECT idCliente, nombre, apellidos, email, numPer, fecha, hora, uniqueId FROM reservas WHERE uniqueId = :id";
            $select = $con->prepare($sql);
            $select->execute(array(":id"=>$id));
            
            // si la consulta devuelve filas, entonces devuelve los datos
            if($select->rowCount() == 1){
                //guardamos en $user un array con la consulta 
                // fetch porque devuelve un solo resultado
                $result = $select->fetch();
                return $result;
                //var_dump($result) ;
            }
        }

        public function modificarReserva($fecha, $hora, $id, $con){
            $sql = "UPDATE reservas SET fecha = :fecha, hora = :hora WHERE uniqueId = :id";
            $update = $con->prepare($sql);
            $update->execute(array(":fecha"=>$fecha, ":hora"=>$hora, ":id"=>$id));
            if($update->rowCount() == 1){
                $result = $update->fetch();
                return $result;
                //var_dump($result) ;
            }
        }

        public function cancelarReserva($reservaCancelada, $id, $con){
            $sql = "UPDATE reservas SET reservaCancelada = :reservaCancelada WHERE uniqueId = :id";
            $update = $con->prepare($sql);
            $update->execute(array(":reservaCancelada"=>$reservaCancelada, ":id"=>$id));
            if($update->rowCount() == 1){
                $result = $update->fetch();
                return $result;
                //var_dump($result) ;
            }
        }
    }

    /*include "classConexion.php";
    $conex = new Conexion();
    $client = new Cliente();
    $datos = ['Sonia', 'Calderon Ruiz', 'soniacalderonruiz@hotmail.com', 3, '2022-02-27', '13:00:00', 1234];
    $client->reservar($datos, $conex);
    
    include "classConexion.php";
    $conex = new Conexion();
    $client = new Cliente();
    $client->selectReservaId(3461, $conex);

    include "classConexion.php";
    $conex = new Conexion();
    $client = new Cliente();
    $client->modificarReserva('2022-02-27', '13:00:00', 4427, $conex);

    include "classConexion.php";
    $conex = new Conexion();
    $client = new Cliente();
    $client->cancelarReserva(1, 8498, $conex);*/
?>