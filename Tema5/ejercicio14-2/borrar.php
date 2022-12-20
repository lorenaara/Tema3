<?
require './seguro/conexion.php';
 try{
        $conexion = new PDO('mysql:host=' . HOST . ';dbname=' . BBDD, USER, PASS);
         $sql= 'Delete  from paciente where id='.$_REQUEST['name'];
         $resultado=$conexion->prepare($sql);
         $resultado->execute();
         header('Location: ./leer.php');
         exit;
     }catch(Exception $ex) {
        echo 'error';
    print_r($ex);
    }finally{
    unset($conexion); 
    }
