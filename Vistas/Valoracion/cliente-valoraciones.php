<?php setlocale(LC_ALL,"es_ES");
    foreach($Llistat as $objecte){ 
        ?>
    <div class="rating-done figure">
        <?php if($objecte->logo) {
            echo "<figure class='logo'><img src=".$objecte->logo."></figure>";
        } else {
            echo "<figure class='logo null'></figure>";
        }?>

        <div class="top">
            
            



            <a class="name" href="tienda.php?id=<?php echo $objecte->id_tienda ?>"><?php echo $objecte->nombre ?></a>
            <span class="date"><?php echo DateTime::createFromFormat('Y-m-d', $objecte->fecha)->format("d/m/Y") ?></span>
        </div>
        <div class="stars stars-0<?php echo $objecte->puntuacion ?>">
            <span></span><span></span><span></span><span></span><span></span>
        </div>
        <div class="comment">
            <?php echo $objecte->comentario ?>
        </div>
        <div class="bottom fz-12">
            <?php if ($objecte->aprobado==0) {
                echo "Sin aprobar";
            } else {
                echo "Aprobado";
            } 
            ?>
            <a href="cliente-valoracion.php?id=<?php echo $objecte->id_valoracion ?>"><b>Modificar</b></a>
        </div>
    </div>
    <hr>
<?php
    }?>
