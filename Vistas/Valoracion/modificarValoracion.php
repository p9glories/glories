<?php    
    /***  ENCABEZADO */

    //GP
   

?>

<?php 
    if (isset($_GET["id"])){
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