<?php    
    // Solo administradores
    require_once "../Controladores/SesionesController.php";
    $objecteSessions = new SesionesController();

    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../../index.php");
    }else{
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]=="Cliente"){
                $_SESSION["Denegado"]="No tiene acceso al módulo";
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

    <h2 class="col-12">Reseñas</h2>

    <!-- Contenido inicio -->
    <div class="col-12">
    <table class="table fz-13">
        <thead>
        <tr>
            <th scope="col">Id valoración</th>
            <th scope="col">Id cliente</th>
            <th scope="col">Id tienda</th>
            
            <th scope="col">Puntuación</th>
            <th scope="col">Comentario</th>

            
            <th scope="col">Aprobación</th>
            <th scope="col">Fecha</th>

            <th scope="col">Nivel</th>

        </tr>
        </thead>

    <?php
        setlocale(LC_ALL,"es_ES");
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td><?php echo $objecte->id_valoracion ?></td>
                <td><?php echo $objecte->id_cliente ?></td>
                <td><?php echo $objecte->id_tienda ?></td>

                <td>
                    <span class="stars stars-0<?php echo $objecte->puntuacion ?>">
                        <span></span><span></span><span></span><span></span><span></span>
                    </span>
                </td>
                <td><?php echo $objecte->comentario ?></td>
                <td><?php echo $objecte->aprobado ? "Sí":"No"?></td>
                <td><?php echo DateTime::createFromFormat('Y-m-d', $objecte->fecha)->format("d/m/Y") ?></td>
                <td><?php echo $objecte->nivel ?></td>
                
                <a href="ValoracionesController.php?tienda=<?php echo $objecte->id_tienda ?>&cliente=<?php echo $objecte->id_cliente ?>&operacio=modificar&valoracion=<?php echo $objecte->id_valoracion ?>" class="d-none">MODIFICAR</a>

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