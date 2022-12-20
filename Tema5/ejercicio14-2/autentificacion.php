<?

if(!isset($_SERVER['PHP_AUTH_USER'])){
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
    echo 'No autorizado';
}else{
    switch ($_REQUEST['operar']) {
        case 'borrar':
           if($_SERVER['PHP_AUTH_USER']=='admin' && $_SERVER['PHP_AUTH_PW']=='admin'){
            header('Location:./borrar.php?name='.$_REQUEST['name']);
            exit;
            }
            break;
        
        case 'modificar':
           if($_SERVER['PHP_AUTH_USER']=='admin' && $_SERVER['PHP_AUTH_PW']=='admin'|| $_SERVER['PHP_AUTH_USER']=='lore1' && $_SERVER['PHP_AUTH_PW']=='lore1'){
            header('Location:./modificar.php?name='.$_REQUEST['name']);
            exit;
            }
            break;
        case 'insertar':
            header('Location:./insertar.php');
            exit;
            break;
    }
} 
        
    


