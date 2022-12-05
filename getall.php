<?php

require("./conexion.php");
require("./cors.php");
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = "SELECT * FROM bajo";
        $statement = $db->prepare($query);
        $statement->execute();
        $vec=[];
        while($row = $statement->fetch()) {
            $vec[]=$row;
        }
    $cad = json_encode($vec);
    echo $cad;
?>