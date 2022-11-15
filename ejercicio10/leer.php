<?
if(isset($_REQUEST['volver'])){
    header('Location: ./eligeFichero.php');
    exit;
}
if(isset($_REQUEST['editar'])){
    header('Location: ./editar.php?nombre='.$_REQUEST['nombre']);
    //input hidden
    exit;
}
//en caso de que haya pulsado leer nos dirige a esta pagina 
   
       if($archivo=fopen($_REQUEST['nombre'], 'r')){
        $leido = fread($archivo, filesize($_REQUEST['nombre']));

    ?>
     <form action="./leer.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="nombre" value="<? echo $_REQUEST['nombre']; ?>">
    <textarea name="fichero" id="fichero" cols="30" rows="10" readonly><?
            echo $leido;
            fclose($archivo);
        ?></textarea>
    <?
        
    }
?>
        <input type="submit" name="volver" value="Volver">
        <input type="submit" name="editar" value="Editar">
     </form>
<a href="codigo.php?fichero=<? echo basename(__FILE__)?>">Codigo de la pagina </a>
<?

?>