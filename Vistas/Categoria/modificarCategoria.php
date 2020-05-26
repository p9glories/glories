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
             $_SESSION["Denegado"]="No tiene acceso al módulo de MODIFICAR la Categoría!!";
             header ("location: ../../index.php");
     }
     if (isset($_SESSION["mensajeModificarIcono"])){
        echo "<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'><h1>";
        echo $_SESSION["mensajeInsertarIcono"];
        unset($_SESSION["mensajeInsertarIcono"]);
        echo "</h1>";
        echo "</div>";
     }
     if (isset($_SESSION["mensajeInsertarCategoria"])){
        echo "<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'><h1>";
        echo $_SESSION["mensajeModificarCategoria"];
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

    <!-- Contenido inicio -->
    
    <?php
    if (isset($_GET["id"])){
        ?>
            <h2 class="col-12">Modifica la Categoría <?php echo $_GET["id"]?></h2>
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
                <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                <input type="hidden" name="operacio" value="modifica">
                <input name="action" class="btn btn-light" onclick="history.back()" type="submit" value="Cancelar"/>
                <input class="btn btn-success" type="submit" value="Modificar">
            </div>
</div>

    </form>

    </div>
        
        </div>


            <?php
    }else{
        echo "NO se puede mostrar";
    }

    ?>
 
<!-- Contenido fin -->

    </div>
    </div>
    </div>
    </div>

<?php include '../../Vistas/Includes/footer.php'; ?>
    
</section>

</body>

</html>