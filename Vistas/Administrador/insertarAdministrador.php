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
             $_SESSION["Denegado"]="No tiene acceso al módulo de insertar Categoría!!";
             header ("location: ../../index.php");
     }
 }


// Header usuarios registrados

    if (isset($_SESSION["login"])){
        if ($_SESSION["login"]==true){
            include '../../Vistas/Includes/header_users.php';
            } 
    } 
    else {
        header("Location: index.php");
    }




?>

<body>

<section class="admin">
    <div class="container">
    <div class="row">
            
    <?php include '../../Vistas/Includes/nav-cuenta-superadmin.php';?>
        
    <div class="col-md-9 content">
    <div class="row">

    <h2 class="col-12">Nuevo administrador</a>
    </h2>

    <!-- Contenido inicio -->


    <div class="col-12">

        <div class="row">
    <form action="../../Controladores/AdministradoresController.php" method="POST">



        <div class="col-12 mb-3">
            <div class="input-container">
                <label class="label" for="email">Correo electrónico</label>
                <input type="text" name="email" required="required">
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="input-container">
                <label class="label" for="password">Contraseña</label>
                <input type="text" name="password" required="required">
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="input-container">
            <label class="label" for="nombre">Nombre</label>
            <input type="text" name="nombre" required="required">
        </div>
        </div>

        <div class="col-12 mb-3">
            <div class="input-container">
            <label class="label" for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" required="required">
        </div>
        </div>

        <div class="col-12 mb-3">
            <div class="input-container">
            <label class="label" for="telefono">Telefono</label>
            <input type="text" name="telefono" required="required">
        </div>
        </div>

        <div class="col-12">
            <input type="hidden" name="newsletter" value="0">
            <input type="hidden" name="operacio" value="inserta">
            <input type="submit" class="btn btn-success" value="Crear cuenta">
            <input name="action" class="btn btn-light" onclick="history.back()" type="submit" value="Cancelar"/>
        </div>
        


</form>

    </div>
        
        </div>


   
<!-- Contenido fin -->

    </div>
    </div>
    </div>
    </div>

<?php include '../../Vistas/Includes/footer.php'; ?>
    
</section>

</body>

</html>
