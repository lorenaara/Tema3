<?
require './seguro/conexion.php';

try{
    $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS, 'hospital');
    $sql= 'Delete  from paciente where id='.$_REQUEST['name'];
    mysqli_query($conexion, $sql);
    header('Location: ./leer.php');
    exit;


}catch(Exception $ex){
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}
?>