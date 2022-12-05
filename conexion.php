<?php

class Conexion{
    
    function getConexion(){
   
        $server = "localhost";   //127.0.0.1  localhost
        $db = "dweb";        //base de datos de mysql
        $user = "root";        //usuario de mysql
        $password = "jonyzx10;";
        $conn = "";
        try{
          //ERROR EN EL CIERRE DE COMILLAS
            $conn = new PDO ("mysql:host=$server;dbname=$db",$user,$password);
            
        }
        catch(PDOException $exp){
            echo ("No se logro conectar correctamete");
    
        }
        return $conn;
    }
}



?>