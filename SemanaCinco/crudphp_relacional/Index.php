<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP MODERNO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
     
    <br>
    <div class="container"> <!-- div container para titulo principal de la pagina -->
        <h1 class="text-center" style="background-color: black; color:white">LISTADO DE CLIENTES </h1>
    </div>

    <br>
    <div class="container"> <!-- div container tabla para mostrar registros -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Run</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Operacion</th>
                </tr>
            </thead>
           <tbody>

            <?php
                require("Config/Conexion.php");

                $sql = $conexion -> query("select * from tablax");
                
                while ($res = $sql->fetch_assoc())
                {
             ?>
               
               <tr>
                    <th scope="row"> <?php echo $res['run'] ?> </th>
                    <th scope="row"> <?php echo $res['nombre'] ?> </th>
                    <th scope="row"> <?php echo $res['fono'] ?> </th>
                    <th scope="row"> <?php echo $res['direccion'] ?> </th>


                    <th>
                        <a href="Pantallas/EditarDatos.php?run=<?php echo $res['run'] ?>" class="btn btn-warning">Editar</a>
                        
                        <a href="CRUD/EliminarDatos.php?run=<?php echo $res['run'] ?>" class="btn btn-danger">Eliminar</a>
                    </th>

               </tr>

             <?php
                }                
             ?>
           </tbody>
        </table>

        <div class="container" >
     
              <a href="Pantallas/AgregarCliente.php" class="btn btn-success">Agregar Cliente</a>

        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>