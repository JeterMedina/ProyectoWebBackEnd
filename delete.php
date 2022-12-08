<?php
    require("./conexion.php");
    require("./cors.php");

    $data = json_decode(file_get_contents('php://input'),true);
    print_r($data);
    $id = $data['Num_Serie'];
    $conexion = new Conexion();
    $db = $conexion->getConexion();
    $query= "DELETE FROM bajo WHERE Num_Serie=:id";
    $statement=$db->prepare($query);
    $statement->bindParam(':id',$id);
    $result = $statement->execute();
    if($result){
        return "removed";
    }
    return "error";
?>