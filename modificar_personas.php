<?php
include "modelo/conexion.php";
$id = $_GET["id"];
$sql = $conexion->query(" select * from personas where id = $id")
?>

<script>

          $modificar == function modificar(){
            var respuesta=alert("Persona Actualizada correctamente");
            return respuesta
        }

        
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modificación</title>
</head>
<body>
<form class="col-4 m-auto p-5" method="POST">
            <h3 class="text-center text-secondary">Modificar Personas</h3>

            <?php
            while($data = $sql->fetch_object()){?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre y Apellido:</label>
                <input type="text" class="form-control" name="nombre" value = "<?= $data->nombre ?>">
            </div>
            <div class="mb-3">
                <label for="cedula" class="form-label">Cédula:</label>
                <input type="text" class="form-control" name="cedula" value = "<?= $data->cedula ?>">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="text" class="form-control" name="correo" value = "<?= $data->correo?>">
            </div>
            <button type="submit" class="btn btn-primary" name="btnmodificar">Modificar</button>
           <?php }
            ?>

        </form>
        <?php

        if (isset($_POST["btnmodificar"])){
            if (isset($_POST["id"]) and isset($_POST["nombre"]) and (isset($_POST["cedula"])) and (isset($_POST["correo"])));
            $nombre = $_POST ["nombre"];
            $cedula = $_POST ["cedula"];
            $correo = $_POST ["correo"];

            $sql = $conexion->query(" update personas set nombre='$nombre', cedula='$cedula', correo='$correo' where id = $id ");

            if($sql == 1){
                
                echo "<script>
                alert('Persona modificada correctamente');
                window.location.href = 'index.php';
              </script>";

            }else{
                echo "<div class = 'alert alert-danger'> Ha Habido un error al modificar </div>";
            }
        }

        ?>
</body>
</html>