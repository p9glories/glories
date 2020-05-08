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
     if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="SuperAdministrador"){
             $_SESSION["Denegado"]="No tiene acceso al módulo de insertar Nivel!!";
             header ("location: ../../index.php");
     }
 }


?>

<h1>Inserta un NIVEL</h1>
<form action="../../Controladores/NivelesController.php" method="POST">
    <div class="two fields">
        <div class="field">
            <label for="nivel">Nivel</label>
            <input type="text" name="nombre" placeholder="descripcion">
        </div>
        
        <input type="hidden" name="operacio" value="inserta">
        <input type="submit" value="Crea NIVEL">
    </div>


<?php    
    /***  PIE */

?>