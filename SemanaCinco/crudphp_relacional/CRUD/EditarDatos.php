<?php

  include_once("../Config/Conexion.php");

  $run = $_POST['run'];
  $nombre = $_POST['nombre'];
  $fono = $_POST['fono'];
  $direccion = $_POST['direccion'];

   
  $sql="update tablax set 
         run = '".$run."',
         nombre = '".$nombre."',
         fono  = $fono,
         direccion = '".$direccion."'
         where run = '".$run."'";
         
  if($res=$conexion->query($sql)) 
  {
              HEADER("location:../Index.php");
  } else 
    {
            echo "Datos NO se actualizo";
    }      

?>