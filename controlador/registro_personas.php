<?php

if (isset($_POST ["btnregistrar"])){
    if (isset($_POST ["nombre"]) and isset($_POST["cedula"]) and isset($_POST["correo"])){
        $nombre= $_POST["nombre"];
        $cedula= $_POST["cedula"];
        $correo= $_POST["correo"];

        $sql = $conexion->query(" insert into personas (nombre, cedula, correo) values('$nombre', '$cedula', '$correo') ");
        if ($sql==1){
            echo '<div class="alert alert-success"> Persona registrada exitosamente</div>';
        }else{
            echo '<div class="alert alert-danger"> Ha habido un error al registrar a la persona</div>';
        }

    }else{
        echo "Los campos están vacios";
    }
}


?>
