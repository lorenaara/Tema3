<?
require('./seguro/conexion.php');
try{
    $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS);
    $script = file_get_contents('./hospital.sql');
    mysqli_multi_query($conexion, $script);
    mysqli_close($conexion);
    header('Location: ./leer.php');
    exit;
}catch (Exception $ex){
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}
?>