<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1>Inserta una Categoría</h1>
<form action="../../Controladores/CategoriasController.php" method="POST">
    <div class="two fields">
        <div class="field">
            <label for="nivel">Categoria</label>
            <input type="text" name="nombre" placeholder="nombre">
        </div>

        <div class="field">
            <label for="nivel">Icono</label>
            <input type="text" name="icono" placeholder="icono">
        </div>
        
        <input type="hidden" name="operacio" value="inserta">
        <input type="submit" value="Crea CATEGORIA">
    </div>
</form>

<?php    
    /***  PIE */

?>