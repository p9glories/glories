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
    <div class="row">

    <h2 class="col-12">Reseñas recibidas</h2>
    
    <!-- Contenido inicio -->
    <div class="col-12">
    <table class="table fz-12">

<div class="ratings">
    <?php setlocale(LC_ALL,"es_ES");
        foreach($Llistat as $objecte){ 
            ?>
        <tr>
            <td>
        <div class="rating-done">
            <div class="top">
                <span class="name"><?php echo $objecte->nombre ?> <?php echo $objecte->apellidos ?> - <?php echo $objecte->nombreNivel ?></span>
                <span class="date"><?php echo DateTime::createFromFormat('Y-m-d', $objecte->fecha)->format("d/m/Y") ?></span>
            </div>
            <div class="stars stars-0<?php echo $objecte->puntuacion ?>">
                <span></span><span></span><span></span><span></span><span></span>
            </div>
            <div class="comment">
                <?php echo $objecte->comentario ?>
            </div>
            <div class="comment">
                <?php if ($objecte->aprobado > 0) {
                    echo "<b class='c-green'>Aprobado</b>";
                } else {
                    echo "<b class='c-999'>Pendiente de aprobación</b>";
                }?>
            </div>
        </div>
        
        </td>
        </tr>

    <?php
        }?>
 
</div>


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