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

<section class="page">
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-sm-3">
                <h2 class="text-center mb-3">Nuevo cliente</h2>
                <form class="text-center" action="../../Controladores/ClientesController.php" method="POST">

                    <div class="input-container mb-3">
                        <input type="text" name="email" id="email" required="required">
                        <label class="label" for="email">Correo electrónico</label>
                    </div>
                    <div class="input-container mb-3">
                        <input type="password" name="password" id="password" required="required">
                        <label class="label" for="paswword">Contraseña</label>
                    </div>
                    <div class="input-container mb-3">
                        <input type="text" name="nombre" id="nombre" required="required">
                        <label class="label" for="nombre">Nombre</label>
                    </div>
                    <div class="input-container mb-3">
                        <input type="text" name="apellidos" id="apellidos" required="required">
                        <label class="label" for="apellidos">Apellidos</label>
                    </div>
                    <div class="input-container mb-3">
                        <input type="text" name="telefono" id="telefono" required="required">
                        <label class="label" for="telefono">Teléfono</label>
                    </div>
                    <div class="input-container mb-3">
                        <input type="text" name="newsletter" id="newsletter" required="required">
                        <label class="label" for="newsletter">NewsLetter</label>
                    </div>
                    <input type="hidden" name="operacio" value="inserta">
                    <button class="btn btn-success" type="submit">Crear cuenta</button>
                </form>
            </div>
        </div>
    </div>

</section>

<?php    
    include '../Includes/footer.php';
?>