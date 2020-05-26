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
    <div class="row">

    <h2 class="col-12">Administradores <a class="btn btn-light" style="float: right;" href="../Vistas/Administrador/insertarAdministrador.php">+ Nuevo administrador</a></h2>

    <!-- Contenido inicio -->
    <div class="col-12">
    <table class="table fz-13">
        <thead>
        <tr>
            <th scope="col">Id admin</th>
            <th scope="col">Id usuario</th>
            <th scope="col">E-mail</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Teléfono</th>
        </tr>
        </thead>

    <?php
        
        foreach($Llistat as $administrador){ 
            ?>
            <tr>
                <td><?php echo $administrador->id_admin ?></td>
                <td><?php echo $administrador->id_usuario ?></td>
                <td><?php echo $administrador->email ?></td>
                <?php $administrador->password ?>
                <td><?php echo $administrador->nombre ?></td>
                <td><?php echo $administrador->apellidos ?></td>
                <td><?php echo $administrador->telefono ?></td>
                
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
