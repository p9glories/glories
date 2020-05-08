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
     if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="SuperAdministrador"){
             $_SESSION["Denegado"]="No tiene acceso al módulo de MODIFICAR la Categoría!!";
             header ("location: ../../index.php");
     }
     if (isset($_SESSION["mensajeModificarIcono"])){
        echo "<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'><h1>";
        echo $_SESSION["mensajeInsertarIcono"];
        unset($_SESSION["mensajeInsertarIcono"]);
        echo "</h1>";
        echo "</div>";
     }
     if (isset($_SESSION["mensajeInsertarCategoria"])){
        echo "<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'><h1>";
        echo $_SESSION["mensajeModificarCategoria"];
        unset($_SESSION["mensajeInsertarCategoria"]);
        echo "</h1>";
        echo "</div>";
     }
 }
   

?>

<?php 
    if (isset($_GET["id"])){
        ?>
            <h1>Modifica la Categoría <?php echo $_GET["id"]?></h1>
            <form action="../../Controladores/CategoriasController.php" method="POST" enctype="multipart/form-data">
                <div class="two fields">
                <div class="field">
                    <label for="categoria">Categoria</label>
                    <input type="text" name="nombre" placeholder="nombre">
                </div>

                <div class="field">
                    <label for="icono">Icono</label>
                    <input type="file" name="icono" placeholder="icono">
                </div>
                <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                <input type="hidden" name="operacio" value="modifica">
                <input type="submit" value="Modifica CATEGORIA">
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