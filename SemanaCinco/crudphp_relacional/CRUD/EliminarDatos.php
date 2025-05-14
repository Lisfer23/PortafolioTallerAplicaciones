<?php
   include("../Config/Conexion.php");

    $id = $_GET['run'];

    $sql="delete from tablax where run='$id'";

    $query = mysqli_query($conexion,$sql);

    if($query===TRUE) 
    {
              HEADER("location:../Index.php");
    } else 
    {
            echo "Datos NO se elimino";
    }      


 ?>  
