<?
require('./seguro/conexion.php');
try {
    $conn = new PDO("mysql:host=" . IP . ";dbname=" . BD, USUARIO, CLAVE);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h1>Conexión correcta</h1>";
    $commands = file_get_contents("./banco.sql");
    $conn->exec($commands);
    
} catch (PDOException $e) {
    echo "<h1>Error en la conexión</h2> " . $e->getMessage();
    echo "<br>";
} finally {
    unset($conn); //Cerramos la conexion
}
?>
