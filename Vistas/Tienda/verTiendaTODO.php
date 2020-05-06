<?php    
    /***  ENCABEZADO */

    //require '';
?>

<h1>Lista TODAS las Tiendas</h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>Nombre_tienda</th>
                    <th>administrador</th>   
                    <th>categoria</th> 
            <th>logo</th>
            <th>horario</th>
            <th>ubicación</th>
            <th>foto1</th>
            <th>foto2</th>
            <th>foto3</th>
        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $objecte->nombre ?></td>

                <td style="border:1px solid black;"><?php echo $objecte->apellidos ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->nombreCategoria ?></td>

                <td style="border:1px solid black;"><?php echo $objecte->logo ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->horario ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->ubicacion ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->foto1 ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->foto2 ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->foto3 ?></td>

            </tr>
    <?php
        }?>
    </table>
</div>
<br>
<a href="../index.html">Inicio</a>

<?php    
    /***  PIE */

?>