<?php    
    /***  ENCABEZADO */
    
    

?>

<h1>Lista TODAS las Valoraciones: </td></h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>id_valoracion</th>
            <th>id_cliente</th>
            <th>id_tienda</th>

            <th>puntuacion</th>
            <th>comentario</th>
            <th>aprobado</th>
            <th>fecha</th>
            <th>nivel</th>

            <th>MODIFICAR</th>

        </tr>
    <?php
        setlocale(LC_ALL,"es_ES");
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $objecte->id_valoracion ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->id_cliente ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->id_tienda ?></td>

                <td style="border:1px solid black;"><?php echo $objecte->puntuacion ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->comentario ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->aprobado ? "SI":"NO"?></td>
                <td style="border:1px solid black;"><?php echo DateTime::createFromFormat('Y-m-d', $objecte->fecha)->format("d/m/Y") ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->nivel ?></td>
                
                <td style="border:1px solid black;"><a href="ValoracionesController.php?tienda=<?php echo $objecte->id_tienda ?>&cliente=<?php echo $objecte->id_cliente ?>&operacio=modificar&valoracion=<?php echo $objecte->id_valoracion ?>">MODIFICAR</a></td>

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