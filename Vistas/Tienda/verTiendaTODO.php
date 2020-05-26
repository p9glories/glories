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
            
    <?php include '../Vistas/Includes/nav-cuenta-superadmin.php';?>
        
    <div class="col-md-9 content">
    <div class="row">

    <h2 class="col-12">Tiendas</h2>

    <!-- Contenido inicio -->
    <div class="col-12">
    <table class="table fz-13">
        <thead>
        <tr>
            <th scope="col">Id tienda</th>
            <th scope="col">Id admin</th>
            <th scope="col">Logo</th>
            <th scope="col">Tienda</th>
            <th scope="col">Categoría</th>
            <th scope="col">Puntuación</th>
            <th scope="col" class="text-right">Opciones</th>
        </tr>
        </thead>

    <?php
        foreach($Llistat as $array){ 
            $objecte = (object)$array;
            ?>
            <tr>
                <td><?php echo $objecte->id_tienda ?></td>
                <td><?php echo $objecte->id_admin ?></td>
                <td>
                    <figure class="img-container">
                    <?php if ($objecte->logo) {
                        echo '<img src="../imagenes/'.$objecte->logo.'">';
                    } else {
                        echo '<img src="../imagenes/no-image.jpg">';
                    }
                    ?>   
                    </figure>
                </td>
                <td><?php echo $objecte->nombre ?></td>
                <td><?php echo $objecte->nombreCategoria ?></td>
                <?php $objecte->horario ?>
                <?php $objecte->ubicacion ?>
                <td>
                    <?php echo $objecte->estrellitas ?>
                    <span class="stars stars-0<?php echo ceil($objecte->estrellitas) ?>">
                    <span></span><span></span><span></span><span></span><span></span>
                </span>
                </td>
                <td>
                <a href="TiendasController.php?operacio=modificar&tienda=<?php echo $objecte->id_tienda ?>" class="d-none">Modificar</a>
                <a class="btn btn-outline-success btn-sm" href="<?php $_SERVER['DOCUMENT_ROOT']?>/Vistas/tienda.php?id=<?php echo $objecte->id_tienda ?>">Ver tienda</a>
                </td>
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
