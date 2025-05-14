<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <br>
    <div class="container"> <!-- div container para titulo principal de la pagina -->
        <h1 class="text-center" style="background-color: black; color:white">EDITAR CLIENTES </h1>
    </div>

    <br>

    <form class="container" action="../CRUD/EditarDatos.php" method="POST">

            <?php
                 include("../Config/Conexion.php");

                $sql = "select * from tablax where run=".$_REQUEST['run'];
   
                $res = $conexion->query($sql);

                $campos = $res->fetch_assoc();
                
             ?>
       

        <div class="mb-3">
            <label class="form-label">Run</label>
            <input type="text" class="form-control" name="run" value="<?php echo $campos['run']; ?>">
        </div>

        
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $campos['nombre']; ?>">
        </div>
        

        <div class="mb-3">
            <label class="form-label">Fono</label>
            <input type="text" class="form-control" name="fono" value="<?php echo $campos['fono']; ?>">
        </div>
        

        <div class="mb-3">
            <label class="form-label">Direccion</label>
            <input type="text" class="form-control" name="direccion" value="<?php echo $campos['direccion']; ?>">
        </div>
        

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>








</body>