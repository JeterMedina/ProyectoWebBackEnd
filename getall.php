<?php

require("./conexion.php");
require("./cors.php"); //Inclumos archivos para hacer la conexion
        $conexion = new Conexion(); //Creamos una variable tipo conexion
        $db = $conexion->getConexion(); //REalizamos conexion
        $query = "SELECT * FROM bajo"; //query para imprimir todo lo requerido en la base de datos
        $statement = $db->prepare($query); //preparamos query
        $statement->execute(); //Ejecutamos
        $vec=[]; //Vector
        while($row = $statement->fetch()) { //Mientras no llegemos al final
            $vec[]=$row; //Guardamos informacion en el vector
        }
    $cad = json_encode($vec);
    echo $cad; //Imprimimos
?>