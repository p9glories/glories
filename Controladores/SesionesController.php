<?php

//GP
class SesionesController{

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

}

if (isset($_GET["operacion"]) && $_GET["operacion"]=="cerrarSesion"){
    $Sessio = new SesionesController();
    session_destroy();

    header("location: ../index.php");
}



?>