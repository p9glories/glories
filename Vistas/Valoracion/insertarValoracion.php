<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1>Inserta una Valoración</h1>
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
        
        <input type="hidden" name="operacio" value="inserta">
        <input type="submit" value="Crea VALORACION">
    </div>
</form>

<?php    
    /***  PIE */

?>