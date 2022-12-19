<?php
    require '../seguro/conexion.php';
function validaUser($user, $pass){
    try{
        $con= new PDO("mysql:host=". HOST. ";dbname=". BBDD, USER, PASS); 
        $sql= "select * from usuarios where usuario = ? and clave = ?";
        $sql_p= $con->prepare($sql);
        $pass_e= sha1($pass);
        $array= array($user,$pass_e);
        $sql_p->execute();

        //si devuelve algo haremos un login 
        if($sql_p->rowCount()==1){ //si el resultado es una fila
            session_start();
            $_SESSION['validado']= true;
            $row= $sql_p->fetch();
            $_SESSION['user']=$user;
            $_SESSION['nombre']= $row['nombre'];
            $_SESSION['perfil']=$_SESSION= $row['perfil'];
            unset($con);
            return true;
        }
        //sino no hay login retorna falso
        else{
            unset($con);
            return false;
        }

    }catch(Exception $ex){
        print_r($ex);
        unset($con);
    }
}