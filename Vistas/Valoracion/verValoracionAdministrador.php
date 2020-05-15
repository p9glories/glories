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

?>

<h1>Lista TODAS las Valoraciones: <?php echo $_SESSION["rol"] ?></td></h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>id_valoracion</th>
            <th>id_cliente</th>
            <th>id_tienda</th>

            <th>puntuacion</th>
            <th>comentario</th>
            <th>aprobado</th>
            <th>fecha</th>
            <th>nivel</th>

    
            <th>APROBAR</th>

            <th>ELIMINAR</th>
    
        </tr>
    
            
        <?php
                   
                   $valoraciones = json_decode($valoraciones,true);

                   foreach($valoraciones as $array=>$contingut){
                        foreach($contingut as $nivellarray=>$nivellcontingut){
                ?>
                         <tr>
                 <?php      foreach($nivellcontingut as $clau=>$valor){    //$clau és el NOm del camp
                 ?>
                         <td style="border:1px solid black;"><?php echo $valor ?></td>   
                     <?php
                            if ($clau == "id_valoracion"){
                                $valoracio = $valor;
                            }
                            if ($clau == "id_cliente"){
                                $clientAbuscar = $valor;
                            }
                        }
                    ?>
                        
                         <td style="border:1px solid black;"><a href="ValoracionesController.php?aprobarValoracion=<?php echo $valoracio ?>&cliente=<?php echo $clientAbuscar ?>">APROBAR</a></td>
                         <td style="border:1px solid black;"><a href="ValoracionesController.php?eliminarValoracion=<?php echo $valoracio ?>&cliente=<?php echo $clientAbuscar ?>">ELIMINAR</a></td>
                     <?php
                    }
                }

                
               ?>
                
        </tr>
        
    </table>
</div>

<br>
<a href="../index.php">Inicio</a>

<?php    
    /***  PIE */

?>