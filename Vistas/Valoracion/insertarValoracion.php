<?php    
    /***  ENCABEZADO */

    //GP
    //require_once "../../Controladores/SesionesController.php";
    //$objecteSessions = new SesionesController();

    require_once "../../Controladores/TiendasController.php";
    
    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../../index.php");
    }else{
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Cliente"){
            $_SESSION["Denegado"]="No tiene acceso al módulo de insertar Valoración!!";
            header ("location: ../../index.php");
        }else{
            //només pot fer 1 valoració          
            if (isset($_SESSION["NumeroValoraciones"])){
                if ($_SESSION["NumeroValoraciones"]!=0){
                    echo "<div style='background-color: red; height: 80px; text-align: center; padding-top: 5px;'><h1>";
                    echo $_SESSION["ExcedeValoraciones"];
                    unset($_SESSION["ExcedeValoraciones"]);
                    echo "</h1></div>";
                }
            }
            
        }
    }

   
?>



<h1>Inserta una Valoración</h1>
<form action="../../Controladores/ValoracionesController.php" method="POST">
    <div class="two fields">



        <div class="field">
            <label for="tienda">Tienda</label>
            <select name="tienda">
                <option value="0">Seleccione:</option>
                    <?php
                        $tiendas = new TiendasController();
                        $valoresTiendas = $tiendas->selectTiendas();
                        foreach ($valoresTiendas as $tenda){
                            echo "<option value=$tenda->id_tienda>".$tenda->nombre."</option>";
                        }
                    ?>
            </select>
        </div>
        <div class="field">
            <label for="puntuacion">Puntuacion</label>
            <input type="text" name="puntuacion" placeholder="puntuacion">
        </div>

        <div class="field">
            <label for="comentario">comentario</label>
            <input type="text" name="comentario" placeholder="comentario">
        </div>
        
        <input type="hidden" name="operacio" value="insertarV">
        <input type="submit" value="Crea VALORACION">
    </div>
</form>

<?php    
    /***  PIE */

?>