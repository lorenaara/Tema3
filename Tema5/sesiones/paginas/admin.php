<?
    session_start();
    require '../funciones/funciones.php';

    if(!estaValidado() || !esAdmin()){
        header('Location: ../login.php');
        exit;
    } 
?>
<header>
    <h2><? echo $_SESSION['nombre']; ?></h2>
    <a href="../logout.php">Log out</a>
</header>
<h1>Administrador</h1>