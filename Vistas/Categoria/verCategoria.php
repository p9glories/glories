<?php    
    // Solo superadministrador
    require_once "../Controladores/SesionesController.php";
    $objecteSessions = new SesionesController();

    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../../index.php");
    }else{
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="SuperAdministrador"){
                $_SESSION["Denegado"]="No tiene acceso al módulo de insertar Usuarios!!";
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
            
    <?php include '../Vistas/Includes/nav-cuenta-superadmin.php';?>
        
    <div class="col-md-9 content">

        <?php if (isset($_SESSION["mensajeResultado"])){
                    echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeResultado"]."</span></div></div>";
                    unset($_SESSION["mensajeResultado"]);

                };
                ?>
                
    <div class="row">

    <h2 class="col-12">Categorías <a class="btn btn-sm btn-light" style="float: right;" href="../Vistas/Categoria/insertarCategoria.php">+ Nueva categoría</a>
    </h2>

    <!-- Contenido inicio -->
    <div class="col-12">
    <table class="table fz-13">
        <thead>
        <tr>
            <th scope="col">Icono</th>
            <th scope="col">Nombre</th>
            <th scope="col">Id categoría</th>
            <th scope="col" class="text-right">Opciones</th>
        </tr>
        </thead>

    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                
                
                <td>
                    <figure class="img-container">
                    <?php if ($objecte->icono) {
                        echo '<img src="../imagenes/'.$objecte->icono.'">';
                    } else {
                        echo '<img src="../imagenes/no-image.jpg">';
                    }
                    ?>   
                    </figure>
                </td>
                <td><?php echo $objecte->nombre ?></td>
                <td><?php echo $objecte->id_categoria ?></td>

                <td class="text-right"><a class="btn btn-sm btn-outline-success" href="CategoriasController.php?operacio=modificar&categoria=<?php echo $objecte->id_categoria ?>">Modificar</a></td>
            </tr>
    <?php
        }?>
    </table>
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
