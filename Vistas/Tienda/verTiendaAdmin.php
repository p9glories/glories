<?php    
    // Solo superadministrador
    require_once "../Controladores/SesionesController.php";
    $objecteSessions = new SesionesController();

    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../../index.php");
    }else{
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Administrador"){
                $_SESSION["Denegado"]="No tiene acceso al módulo!!";
                header ("location: ../../index.php");
        }
    }

    // Header usuarios registrados

    if (isset($_SESSION["login"])){
        if ($_SESSION["login"]==true){
            include '../Vistas/Includes/header_users.php';
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
            
    <?php include '../Vistas/Includes/nav-cuenta-admin.php';?>
        
    <div class="col-md-9 content">

        <?php if (isset($_SESSION["mensajeResultado"])){
                    echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeResultado"]."</span></div></div>";
                    unset($_SESSION["mensajeResultado"]);

                };
                ?>

    <div class="row">

    <h2 class="col-12">Tienda</h2>

    <!-- Contenido inicio -->
    <div class="col-12">
    <div class="row">
    <?php
        
        foreach($Llistat as $array){ 
            $objecte = (object)$array;
            ?>
            

                <div class="col-md-4 mb-3">
                  <div class="input-container disabled">
                    <div class="input"><?php echo $objecte->id_tienda ?></div>
                    <span class="label sm">Id de tienda</span>
                  </div>
                </div>
                  <!---->
                <div class="col-md-4 mb-3">
                  <div class="input-container disabled">
                    <div class="input"><?php echo $objecte->id_admin ?></div>
                    <span class="label sm">Id de administrador</span>
                  </div>
                </div>
                  <!---->
                <div class="col-md-4 mb-3">
                  <div class="input-container disabled">
                    <div class="input"><?php echo $objecte->id_categoria ?></div>
                    <span class="label sm">Categoría</span>
                  </div>
                </div>
                <!---->
                <div class="col-md-12 mb-3">
                  <div class="input-container disabled">
                    <div class="input"><?php echo $objecte->nombre ?></div>
                    <span class="label sm">Nombre de la tienda</span>
                  </div>
                </div>
                <!---->
                <div class="col-md-12 mb-3">
                  <div class="input-container disabled">
                    <div class="input"><?php echo $objecte->descripcion ?></div>
                    <span class="label sm">Descripción</span>
                  </div>
                </div>
                <!---->
                <div class="col-md-12 mb-3">
                  <div class="input-container disabled">
                    <div class="input"><?php echo $objecte->horario ?></div>
                    <span class="label sm">Horario</span>
                  </div>
                </div>
                <!---->
                <div class="col-md-12 mb-3">
                  <div class="input-container disabled">
                    <div class="input"><?php echo $objecte->ubicacion ?></div>
                    <span class="label sm">Ubicación</span>
                  </div>
                </div>
                <!---->
                <div class="col-md-6 mb-3">
                  <div class="input-container disabled">
                    <div class="input">
                        <figure class="img-container">
                        <?php if ($objecte->logo) {
                            echo '<img src="../imagenes/'.$objecte->logo.'">';
                        } else {
                            echo '<img src="../imagenes/no-image.jpg">';
                        }
                        ?>   
                        </figure>
                    </div>
                    <span class="label sm">Logo</span>
                  </div>
                </div>
                <!---->
                <div class="col-md-6 mb-3">
                    <div class="input-container disabled">
                        <div class="input">
                        <figure class="img-container">
                        <?php if ($objecte->foto1) {
                            echo '<img src="../imagenes/'.$objecte->foto1.'">';
                        } else {
                            echo '<img src="../imagenes/no-image.jpg">';
                        }
                        ?>   
                        </figure>
                        </div>
                        <span class="label sm">Foto 1</span>
                    </div>
                </div>
                <!---->
                <div class="col-md-6 mb-3">
                    <div class="input-container disabled">
                        <div class="input">
                        <figure class="img-container">
                        <?php if ($objecte->foto2) {
                            echo '<img src="../imagenes/'.$objecte->foto2.'">';
                        } else {
                            echo '<img src="../imagenes/no-image.jpg">';
                        }
                        ?>   
                        </figure>
                        </div>
                        <span class="label sm">Foto 2</span>
                    </div>
                </div>
                <!---->
                <div class="col-md-6 mb-3">
                    <div class="input-container disabled">
                        <div class="input">
                        <figure class="img-container">
                        <?php if ($objecte->foto3) {
                            echo '<img src="../imagenes/'.$objecte->foto3.'">';
                        } else {
                            echo '<img src="../imagenes/no-image.jpg">';
                        }
                        ?>   
                        </figure>
                        </div>
                        <span class="label sm">Foto 3</span>
                    </div>
                </div>
                <!---->
                <div class="col-md-12 mb-3">
                    <a class="btn btn-outline-success" href="TiendasController.php?operacio=modificar&tienda=<?php echo $objecte->id_tienda ?>">Modificar</a>
                    <a class="btn btn-success" href="<?php $_SERVER["DOCUMENT_ROOT"]?>/Vistas/tienda.php?id=<?php echo $objecte->id_tienda ?>">Ver tienda</a>
                </div>
                
            
                
            
    <?php
        } 

        if (empty($objecte)) {
           ?>
            <div class="col-12">
                <p>No tienes tienda creada. </p>
                <p><a class="btn btn-success" href="../../Vistas/Tienda/insertarTienda.php"><b>Crear tienda</b></a></p>
            </div>
            <?php
        }

        ?>

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

<?php include '../Vistas/Includes/footer.php'; ?>
    
</section>

</body>

</html>
