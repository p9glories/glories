<?php    
    /***  ENCABEZADO */

    //GP
   

?>

<?php 
    if (isset($_GET["id"])){
        ?>
            <h1>Modifica el Nivel <?php echo $_GET["id"]?></h1>
            <form action="../../Controladores/NivelesController.php" method="POST">
            <div class="two fields">
                <div class="field">
                 <label for="nivel">Nivel</label>
                    <input type="text" name="nombre" placeholder="nombre">
                </div>
        
                <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                <input type="hidden" name="operacio" value="modifica">
                <input type="submit" value="modifica el Nivel">
            </div>
            <?php
    }else{
        echo "NO se puede mostrar";
    }

    ?>

<?php    
    /***  PIE */

?>