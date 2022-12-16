<?
require('./seguro/conexion.php');
    try{
        $conexion= new PDO('mysql:host='. HOST . ';dbname=' . BBDD, USER, PASS);
        $script = file_get_contents('./hospital.sql');
        
    }catch (Exception $ex) {
        echo 'error';
        print_r($ex);
    }finally{
    unset($conexion); //Se cierra la conexion
    }
?>
