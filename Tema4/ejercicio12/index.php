<?
require('./seguro/conexion.php');
try{

   mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,'hospital');
   echo '<a href="./leer.php">Leer tabla</a>'; 
   echo '<a href="./insertar.php">Insertar</a>';
   
}catch (Exception $ex){
    //echo mysqli_connect_errno();
    //echo mysqli_connect_error();
    if(mysqli_connect_errno()==1049){
        echo '<a href="./ejecutarScript.php">Crear base de datos</a>';
    }else{
        //controlar error de contraseña con un else if
    }
}
?>
