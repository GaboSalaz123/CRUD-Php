<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Crud Php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/c2e0e2e10b.js" crossorigin="anonymous"></script>
    </head>
    <script>
        function eliminar(){
            var respuesta=confirm("¿Estás seguro de eliminar este dato?");
            return respuesta
        }

        function modificar(){
            var respuesta=alert("Persona Actualizada correctamente");
            return respuesta
        }
            
    </script>

    <body>
    <h1 style="text-align:center">Crud Con Php</h1>
    <hr>
    <div class="container-fluid row">
        <form class="col-4" method="POST">
            <h3 class="text-center text-secondary">Registro de Personas</h3>
            <?php    
                include_once "modelo/conexion.php";
                include "controlador/eliminar_persona.php";
                include "controlador/registro_personas.php";
    ?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre y Apellido:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="cedula" class="form-label">Cédula:</label>
                <input type="text" class="form-control" name="cedula" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="text" class="form-control" name="correo" >
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar">Registrar</button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead class="table-info">
                    <tr>
                        <th scope="col">Id Persona</th>
                        <th scope="col">Nombre y Apellido</th>
                        <th scope="col">Cédula</th>
                        <th scope="col">Correo</th>
                        <th scope="col" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = $conexion->query("SELECT * FROM personas");
                while ($datos = $sql->fetch_object()) { ?>
                    <tr class="table-light">
                        <td><?php echo $datos->id; ?></td>
                        <td><?php echo $datos->nombre; ?></td>
                        <td><?php echo $datos->cedula; ?></td>
                        <td><?php echo $datos->correo; ?></td>
                        <td><a href="modificar_personas.php?id= <?=$datos->id?>" class="btn btn-small btn-warning"><i class="fa-solid fa-user-pen"></i> Editar</a></td>
                        <td><a onclick="return eliminar()" href="index.php?id= <?=$datos->id?>" class="btn btn-small btn-danger"><i class="fa-sharp fa-solid fa-trash"></i> Eliminar</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>