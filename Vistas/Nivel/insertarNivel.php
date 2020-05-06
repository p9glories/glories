<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1>Inserta un NIVEL</h1>
<form action="../../Controladores/NivelesController.php" method="POST">
    <div class="two fields">
        <div class="field">
            <label for="nivel">Nivel</label>
            <input type="text" name="nombre" placeholder="descripcion">
        </div>
        
        <input type="hidden" name="operacio" value="inserta">
        <input type="submit" value="Crea NIVEL">
    </div>


<?php    
    /***  PIE */

?>