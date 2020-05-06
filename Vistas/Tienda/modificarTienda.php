<?php    
    /***  ENCABEZADO */

    //GP
   

?>

<?php 
    if (isset($_GET["id"])){
        ?>
        <h1>Modifica la Tienda <?php echo $_GET["id"]?></h1>
        <form action="../../Controladores/TiendasController.php" method="POST">
            <div class="six fields">
            <div class="field">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" placeholder="nombre">
            </div>
            <div class="field">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" placeholder="descripcion">
            </div>
            <div class="field">
                <label for="logo">logo</label>
                <input type="text" name="logo" placeholder="logo">
   
            </div>
            <div class="field">
                <label for="horario">Horario</label>
                <input type="text" name="horario" placeholder="horario">
            </div>
            <div class="field">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" placeholder="Telefono">
            </div>
            <div class="field">
                <label for="ubicacion">Ubicación</label>
                <input type="text" name="ubicacion" placeholder="Ubicacion">
            </div>
            <div class="field">
                <label for="foto1">Foto_1</label>
                <input type="text" name="foto1" placeholder="foto1">
            </div>
            <div class="field">
                <label for="foto2">Foto_2</label>
                <input type="text" name="foto2" placeholder="foto2">
            </div> <div class="field">
                <label for="foto3">Foto_3</label>
                <input type="text" name="foto3" placeholder="foto3">
            </div>
            <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
            <input type="hidden" name="operacio" value="modifica">
            <input type="submit" value="Modifica la TIENDA">
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