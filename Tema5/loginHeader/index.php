<?
if(!isset($_SERVER['PHP_AUTH_USER'])){
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'No autorizado';
}elseif($_SERVER['PHP_AUTH_USER']=='lore1' && $_SERVER['PHP_AUTH_PW']=='lore1'){
    header('Location: ./paginaConPermiso.php');
    //echo 'Mi pagina con derecho de admision';
}else{
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'No autorizado';
}
