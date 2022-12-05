<?php
    require("./conexion.php");
    require("./cors.php");

    $data = json_decode(file_get_contents('php://input'),true);

    $modelo = $data['Modelo'];
    $marca = $data['Marca'];
    $anio = $data['Anio'];
    $nocuerdas = $data['NoCuerdas'];
    $serie = $data['Num_Serie'];

    $conexion = new Conexion();
    $db = $conexion->getConexion();
    $query = "INSERT INTO bajo (Modelo, Marca, Anio, NoCuerdas, Num_Serie) VALUES (:modelo,:marca,:anio,:nocuerdas,:serie)";
    $statement = $db->prepare($query);
    $statement->bindParam(":modelo", $modelo);
    $statement->bindParam(":marca", $marca);
    $statement->bindParam(":anio", $anio);
    $statement->bindParam(":nocuerdas", $nocuerdas);
    $statement->bindParam(":serie", $serie);
    $result = $statement->execute();

    if($result){
        return "si se pudo";
    }
    return"Error!!";
?>