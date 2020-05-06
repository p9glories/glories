<?php    
    /***  ENCABEZADO */

    //require '';
   
?>

<h1>Lista TODAS las Tiendas</h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>id_tienda</th>
            <th>id_admin</th>
            <th>id_categoria</th>

            <th>nombre</th>
            <th>logo</th>
            <th>horario</th>
            <th>ubicación</th>
            <th>foto1</th>
            <th>foto2</th>
            <th>foto3</th>

            <th>MODIFICAR</th>
        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $objecte->id_tienda ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->id_admin ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->id_categoria ?></td>

                <td style="border:1px solid black;"><?php echo $objecte->nombre ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->logo ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->horario ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->ubicacion ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->foto1 ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->foto2 ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->foto3 ?></td>

                <td style="border:1px solid black;"><a href="TiendasController.php?operacio=modificar&tienda=<?php echo $objecte->id_tienda ?>">MODIFICAR</a></td>
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