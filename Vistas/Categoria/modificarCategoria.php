<?php    
    /***  ENCABEZADO */

    //GP
   

?>

<?php 
    if (isset($_GET["id"])){
        ?>
            <h1>Modifica la Categoría <?php echo $_GET["id"]?></h1>
            <form action="../../Controladores/CategoriasController.php" method="POST">
                <div class="two fields">
                <div class="field">
                    <label for="categoria">Categoria</label>
                    <input type="text" name="nombre" placeholder="nombre">
                </div>

                <div class="field">
                    <label for="icono">Icono</label>
                    <input type="text" name="icono" placeholder="icono">
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