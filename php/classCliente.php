<?php
    class Cliente{
        //insert reserve data
        public function reservar($datos, $con){
            $insert = "INSERT INTO reservas (nombre, apellidos, email, numPer, fecha, hora, uniqueId) VALUES (:name, :lastname, :email, :numPeople, :date, :time, :uniqueId)";
            $insertClient = $con->prepare($insert);
            $insertClient->execute(array(":name"=>$datos[0], ":lastname"=>$datos[1], ":email"=>$datos[2], ":numPeople"=>$datos[3], ":date"=>$datos[4], ":time"=>$datos[5], ":uniqueId"=>$datos[6]));
            var_dump($_POST);
        }

        //extract reserve data by id
        public function selectReservaId($id, $con){
            $sql = "SELECT idCliente, nombre, apellidos, email, numPer, fecha, hora, uniqueId FROM reservas WHERE uniqueId = :id";
            $select = $con->prepare($sql);
            $select->execute(array(":id"=>$id));
            
            //if there are rows, return the data
            if($select->rowCount() == 1){
                $result = $select->fetch();
                return $result;
            }
        }

        //update reserve data
        public function modificarReserva($numPer, $fecha, $hora, $id, $con){
            $sql = "UPDATE reservas SET numPer = :numPer, fecha = :fecha, hora = :hora WHERE uniqueId = :id";
            $update = $con->prepare($sql);
            $update->execute(array(":numPer"=>$numPer, ":fecha"=>$fecha, ":hora"=>$hora, ":id"=>$id));
            if($update->rowCount() == 1){
                $result = $update->fetch();
                return $result;
            }
        }

        //update reserve data when cancelling it
        public function cancelarReserva($reservaCancelada, $id, $con){
            $sql = "UPDATE reservas SET reservaCancelada = :reservaCancelada WHERE uniqueId = :id";
            $update = $con->prepare($sql);
            $update->execute(array(":reservaCancelada"=>$reservaCancelada, ":id"=>$id));
            if($update->rowCount() == 1){
                $result = $update->fetch();
                return $result;
            }
        }
    }
?>