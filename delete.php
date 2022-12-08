<?php
    require("./conexion.php");
    require("./cors.php"); //Incluimos los archivos necesarios para hacer la conexion

    $data = json_decode(file_get_contents('php://input'),true); //Recibe la informacion a borrar
    $id = $data['Num_Serie']; //Agrega a la variable ID el valor que se buscara para borrar el dato en la base
    $conexion = new Conexion(); //Realizamos conexion
    $db = $conexion->getConexion(); //Funcion para conectar
    $query= "DELETE FROM bajo WHERE Num_Serie=:id"; //Query que tiene la line en SQL para eliminar
    $statement=$db->prepare($query); //Preparamos el query
    $statement->bindParam(':id',$id); //
    $result = $statement->execute(); //Ejecutamos
    if($result){
        return "removed"; //Resultado
    }
    return "error"; //Error
?>