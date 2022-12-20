<?

session_start();
require '../funciones/funciones.php';

if (!estaValidado()) {
    header('Location: ../login.php');
    exit;
}
?>
<header>
    <h2><? echo $_SESSION['nombre']; ?></h2>
    <a href="../logout.php">Log out</a>
</header>

<?
if (esModerador()) { ?>
    <h1>Moderador</h1>
<?
} else { ?>
    <h1>Usuario</h1>
<?
}
?>