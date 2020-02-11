<?php

class Conectar{
    public function conexion(){
        $servidor="localhost";
        $usuario="root";
        $password="";
        $base="pollos-san-pedro";

        $conexion=mysqli_connect($servidor,$usuario,$password,$base);
        if($conexion->connect_errno){
            echo "fallo al conectar: ".$conexion->connect_error;
        }
        $conexion->set_charset("utf8");
        ini_set("date.timezone", "America/Caracas");
        return $conexion;
    }
}

// $obj = new Conectar();

//  if($obj->conexion()){
//      echo 'conectado';
//  }else{
//      echo 'error';
//  }

?>
