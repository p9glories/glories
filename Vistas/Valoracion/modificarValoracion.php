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
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Cliente"){
            $_SESSION["Denegado"]="No tiene acceso al módulo de MODIFICAR la VALORACIÓN!!";
            header ("location: ../../index.php");
        }else{
            //només pot modificar la seva pròpia valoració:
            if(isset($_GET["usuario"]) && ($_GET["usuario"]!=$_SESSION["id_usuario"])){
                $_SESSION["Denegado"]="No tiene acceso a MODIFICAR esta VALORACIÓN!!";
                header ("location: ../../index.php");
            }
        }
    }


?>

<?php 

    if (isset($_GET["id"]) && isset($_GET["tienda"])){
        ?>
        <h1>Modifica la valoracion <?php echo $_GET["id"]?></h1>
        <form action="../../Controladores/ValoracionesController.php" method="POST">
        <div class="two fields">
        <div class="field">
            <label for="puntuacion">Puntuacion</label>
            <input type="text" name="puntuacion" placeholder="puntuacion">
        </div>

        <div class="field">
            <label for="comentario">comentario</label>
            <input type="text" name="comentario" placeholder="comentario">
        </div>
        <input type="hidden" name="tienda" value="<?php echo $_GET["tienda"]?>">
        <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
        <input type="hidden" name="operacio" value="modifica">
        <input type="submit" value="modifica la VALORACION">
    </div>
        </form>
            <?php
    }else{
        echo "NO se puede mostrar";
    }

    ?>

<?php    
    /***  PIE */

?>