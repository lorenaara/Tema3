<?
require('./seguro/conexion.php');
    try{
        $conexion= new PDO('mysql:host='. HOST . ';dbname=' . BBDD, USER, PASS);
        echo '<a href="./leer.php">Leer tabla  </a><br>'; 
        echo '<a href="./insertar.php">   Insertar</a>';
    }catch (Exception $ex) {
        echo 'error';
        print_r($ex);
    }finally{
    unset($conexion); 
    }
?>