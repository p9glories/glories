<?php    
    /***  ENCABEZADO */

    //GP
    require_once "../../Controladores/CategoriasController.php";
    require_once "../../Controladores/SesionesController.php";
    $objecteSessions = new SesionesController();


    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../../index.php");
    }else{
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Administrador"){
                $_SESSION["Denegado"]="No tiene acceso al módulo de insertar Tienda!!";
                header ("location: ../../index.php");
        }else{  
            if (isset($_SESSION["mensajeFaltaCategoria"])){
                echo $_SESSION["mensajeFaltaCategoria"];
                unset($_SESSION["mensajeFaltaCategoria"]);
            }
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
            
    <?php include '../../Vistas/Includes/nav-cuenta-admin.php';?>
    <?php require_once "../../Controladores/CategoriasController.php";?>
    <div class="col-md-9 content">
    <div class="row">

    <h2 class="col-12">Nueva tienda</h2>

    <!-- Contenido inicio -->

<form action="../../Controladores/TiendasController.php" method="POST" enctype="multipart/form-data">
    <div class="row">

        <div class="col-md-6 mb-3">
                <div class="input-container select">
            <label class="label" for="categoria">Categoria</label>
            <select name="categoria">
                <option value="0">Seleccione:</option>
                    <?php
                        
                        $categorias = new CategoriasController();
                        $valoresCategorias = $categorias->selectCategorias();
                        foreach ($valoresCategorias as $categoria){
                            echo "<option value=$categoria->id_categoria>".$categoria->nombre."</option>";
                        }
                    ?>
            </select>

        </div>
            </div>


   
        <div class="col-md-12 mb-3">
            <div class="input-container">
                <label class="label" for="nombre">Nombre</label>
                <input type="text" name="nombre" required="required">
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="input-container">
                <label class="label" for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" required="required">
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="input-container">
                <label class="label" for="horario">Horario</label>
                <input type="text" name="horario" required="required">
            </div>
        </div>
        
        <div class="col-md-6 mb-3">
            <div class="input-container">
                <label class="label" for="telefono">Telefono</label>
                <input type="text" name="telefono" required="required">
            </div>
        </div>
        
        <div class="col-md-6 mb-3">
            <div class="input-container">
                <label class="label" for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion" required="required">
            </div>
        </div>

        <div class="col-md-6 mb-3">
                <div class="input-container">
                    <label class="label" for="logo">logo</label>
                    <input type="file" name="logo" required="required">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-container">
                    <label class="label" for="foto1">Foto_1</label>
                    <input type="file" name="foto1" required="required">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-container">
                    <label class="label" for="foto2">Foto_2</label>
                    <input type="file" name="foto2" required="required">
                </div> 
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-container">
                    <label class="label" for="foto3">Foto_3</label>
                    <input type="file" name="foto3" required="required">
                </div>
            </div>
            <div class="col-md-12">
        <input type="hidden" name="operacio" value="insertaT">
        <input type="submit" value="Crear tienda" class="btn btn-success">
        <a href="javascript:history.back()" class="btn btn-light">Cancelar</a>
            </div>


    </div>
</form>




</div>
</div>
</div>
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
