<?php    
    /***  ENCABEZADO */
//GP
require_once "../../Controladores/SesionesController.php";
$objecteSessions = new SesionesController();


if (!isset($_SESSION["id_usuario"])){
    $_SESSION["login"] = false;
    $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
    header ("location: ../../index.php");
}else{
    if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Cliente"){
            $_SESSION["Denegado"]="No tiene acceso al módulo de insertar Cliente!!";
            header ("location: ../../index.php");
    }
}

?>

<h1>Inserta un Cliente</h1>
<form action="../../Controladores/ClientesController.php" method="POST">
    <div class="six fields">
        <div class="field">
            <label for="email">Correo electrónico</label>
            <input type="text" name="email" placeholder="@">
        </div>
        <div class="field">
            <label for="paswword">Contraseña</label>
            <input type="password" name="password" placeholder="contraseña">
        </div>
        <div class="field">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="nombre">
   
        </div>
        <div class="field">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" placeholder="Apellidos">
        </div>
        <div class="field">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" placeholder="Telefono">
        </div>
        <div class="field">
            <label for="newsletter">NewsLetter</label>
            <input type="text" name="newsletter" placeholder="NewsLetter">
        </div>
        <input type="hidden" name="operacio" value="inserta">
        <input type="submit" value="Crea CLIENTE">
    </div>


<?php    
    /***  PIE */

?>