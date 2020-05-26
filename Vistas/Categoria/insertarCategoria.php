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
     if (isset($_SESSION["mensajeInsertarIcono"])){
        echo "<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'><h1>";
        echo $_SESSION["mensajeInsertarIcono"];
        unset($_SESSION["mensajeInsertarIcono"]);
        echo "</h1>";
        echo "</div>";
     }
     if (isset($_SESSION["mensajeInsertarCategoria"])){
        echo "<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'><h1>";
        echo $_SESSION["mensajeInsertarCategoria"];
        unset($_SESSION["mensajeInsertarCategoria"]);
        echo "</h1>";
        echo "</div>";
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

    <h2 class="col-12">Nueva categoría</a>
    </h2>

    <!-- Contenido inicio -->

    <div class="col-12">

        <div class="row">
    <form action="../../Controladores/CategoriasController.php" method="POST" enctype="multipart/form-data">
        
            <div class="col-12 mb-3">
                <div class="input-container">
                    <input type="text" name="nombre" required="required">
                    <label class="label" for="nombre">Categoria</label>
                </div>
            </div>

            <div class="col-12 mb-3">
                <div class="input-container">
                    <input type="file" name="icono" required="required">
                    <label class="label" for="icono">Icono</label>
                </div>
            </div>
            
            <div class="col-12 mb-3">
                <input type="hidden" name="operacio" value="inserta">
                <input name="action" class="btn btn-light" onclick="history.back()" type="submit" value="Cancelar"/>
                <input type="submit" class="btn btn-success" value="Crear categoría">

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
