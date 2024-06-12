<?php

if(isset ($_GET ["id"])){
    $id= $_GET["id"];
    $sql = $conexion->query(" delete from personas where id = $id ");
if($sql ==1){
        echo "<div class='alert alert-success'> Persona Eliminada exitosamente</div>";
    }else{
        echo "<div class='alert alert-danger'> Ha habido algun error al eliminar una persona</div>";
    }
}

?>