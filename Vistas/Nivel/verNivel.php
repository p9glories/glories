<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1>Lista los Niveles</h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>id_nivel</th>
            <th>nombre</th>

            <th>MODIFICAR</th>
        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $objecte->id_nivel ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->nombre ?></td>

                <td style="border:1px solid black;"><a href="NivelesController.php?operacio=modificar&nivel=<?php echo $objecte->id_nivel ?>">MODIFICAR</a></td>
            </tr>
    <?php
        }?>
    </table>
</div>
<br>
<a href="../index.php">Inicio</a>

<?php    
    /***  PIE */

?>