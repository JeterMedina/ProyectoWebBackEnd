<?php
    require("./conexion.php");
    require("./cors.php");  //Incluimos los archivos necesarios para hacer la conexion

    $data = json_decode(file_get_contents('php://input'),true); //Recibe la informacion a guardar

    $modelo = $data['Modelo'];
    $marca = $data['Marca'];
    $anio = $data['Anio'];
    $nocuerdas = $data['NoCuerdas'];
    $serie = $data['Num_Serie']; //Agrega a las variables que se buscara para guardar los datos en la base

    $conexion = new Conexion(); //Realizamos conexion
    $db = $conexion->getConexion(); //Funcion para conectar
    $query = "INSERT INTO bajo (Modelo, Marca, Anio, NoCuerdas, Num_Serie) VALUES (:modelo,:marca,:anio,:nocuerdas,:serie)"; //Query que tiene la line en SQL para agregar
    $statement=$db->prepare($query); //Preparamos el query
    $statement->bindParam(":modelo", $modelo);
    $statement->bindParam(":marca", $marca);
    $statement->bindParam(":anio", $anio);
    $statement->bindParam(":nocuerdas", $nocuerdas);
    $statement->bindParam(":serie", $serie);
    $result = $statement->execute(); //ejecutamos

    if($result){
        return "si se pudo";
    }
    return"Error!!";
?>