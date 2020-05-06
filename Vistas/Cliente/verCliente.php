<?php    
    /***  ENCABEZADO */

    //require '';

?>

<h1>Lista TODOS los Clientes</h1>

<div>

    <table style="border:1px solid black;">
        <tr>
            <th>id_cliente</th>
            <th>id_usuario</th>
            <th>id_nivel</th>

            <th>email</th>
            <th>nombre</th>
            <th>apellidos</th>
            <th>telefono</th>
            <th>newsletter</th>

            <th>alta</th>
            <th>valoraciones</th>
        </tr>
    <?php
        
        foreach($Llistat as $objecte){ 
            ?>
            <tr>
                <td style="border:1px solid black;"><?php echo $objecte->id_cliente ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->id_usuario ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->id_nivel ?></td>

                <td style="border:1px solid black;"><?php echo $objecte->email ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->nombre ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->apellidos ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->telefono ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->newsletter ? "SI":"NO"?></td>

                <td style="border:1px solid black;"><?php echo $objecte->alta ?></td>
                <td style="border:1px solid black;"><?php echo $objecte->valoraciones ?></td>

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