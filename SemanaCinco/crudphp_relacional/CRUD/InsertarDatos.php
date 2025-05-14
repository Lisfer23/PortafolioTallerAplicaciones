<?php

   include("../Config/Conexion.php");

   $run = $_POST['run'];
   $nombre = $_POST['nombre'];
   $fono = $_POST['fono'];
   $direccion = $_POST['direccion'];

   $sql="insert into tablax(run,nombre,fono,direccion) values('$run','$nombre',$fono,'$direccion')";

   $res=mysqli_query($conexion,$sql);

   if($res=== TRUE) 
   {
        HEADER("location:../Index.php");
   } else 
   {
      echo "Datos NO se Guardaron";
   }
   
?>
