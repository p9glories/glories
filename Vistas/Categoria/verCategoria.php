<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1>Lista Categorias</h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>id_categoria</th>
            <th>nombre</th>
            <th>icono</th>

            <th>MODIFICAR</th>
        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $objecte->id_categoria ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->nombre ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->icono ?></td>

                <td style="border:1px solid black;"><a href="CategoriasController.php?operacio=modificar&categoria=<?php echo $objecte->id_categoria ?>">MODIFICAR</a></td>
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