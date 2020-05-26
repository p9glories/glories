<?php    
    /***  ENCABEZADO */
    
    //GP
        
    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../index.php");
    }else{
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Administrador"){
            $_SESSION["Denegado"]="No tiene acceso al módulo de revisar las Valoraciones!!";
            header ("location: ../index.php");
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

    <h2 class="col-12">Valoraciones pendientes de aprobación</h2>

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


            <th scope="col" class="text-right">Opciones</th>
        </tr>
        </thead>

            
        <?php
                   
                   $valoraciones = json_decode($valoraciones,true);

                   foreach($valoraciones as $array=>$contingut){
                        foreach($contingut as $nivellarray=>$nivellcontingut){
                ?>
                         <tr>
                 <?php      foreach($nivellcontingut as $clau=>$valor){    //$clau és el NOm del camp
                 ?>
                         <td><?php echo $valor ?></td>   
                     <?php
                            if ($clau == "id_valoracion"){
                                $valoracio = $valor;
                            }
                            if ($clau == "id_cliente"){
                                $clientAbuscar = $valor;
                            }
                        }
                    ?>
                        
                         <td><a class="btn btn-sm btn-success" href="ValoracionesController.php?aprobarValoracion=<?php echo $valoracio ?>&cliente=<?php echo $clientAbuscar ?>">APROBAR</a></td>
                         <td><a class="btn btn-sm btn-danger" href="ValoracionesController.php?eliminarValoracion=<?php echo $valoracio ?>&cliente=<?php echo $clientAbuscar ?>">ELIMINAR</a></td>
                     <?php
                    }
                }

                
               ?>
                
        </tr>
        
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
