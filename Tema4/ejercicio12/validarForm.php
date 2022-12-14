<?
require './seguro/conexion.php';
function vacio($nombre)
{
    if (empty($_REQUEST[$nombre])) {
        return true;
    }
    return false;
}
function enviado()
{
    if (isset($_REQUEST['enviar']))
        return true;
    return false;
}
function nombre($nombre)
{
    if (strlen($nombre) <= 45) {
        return true;
    }
    return false;
}
//la fecha no tiene que estar validada ya que con date lo que se recibe es año/mes/dia
function insertar($nombre, $nacimiento, $peso)
{
    $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS, 'hospital');
    //consulta para insertar en la bdd
    $sql = 'insert into paciente values (id,?,?,?)';
    $consulta_preparada = mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($consulta_preparada, $sql);
    mysqli_stmt_bind_param($consulta_preparada, 'ssd', $nombre, $nacimiento, $peso);
    mysqli_stmt_execute($consulta_preparada);
    mysqli_close($conexion);
    header('Location: ./leer.php');
    exit;

}
function validarForm(){
    if(enviado()){
        if(!vacio('nombre') && !vacio('nacimiento') && !vacio('peso')){
            insertar($_REQUEST['nombre'], $_REQUEST['nacimiento'], $_REQUEST['peso']);

        }
    }
}


?>