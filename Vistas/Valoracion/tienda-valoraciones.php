<div class="ratings">
    <?php setlocale(LC_ALL,"es_ES");
        foreach($Llistat as $objecte){ 
            ?>
        <div class="rating-done eee">
            <div class="top">
                <span class="name"><?php echo $objecte->nombre ?> <?php echo $objecte->apellidos ?> <small>(<?php echo $objecte->nombreNivel?>)</small></span>
                
            </div>
            <div class="stars stars-0<?php echo $objecte->puntuacion ?>">
                <span></span><span></span><span></span><span></span><span></span>
            </div>
            <div class="comment">
                <?php echo $objecte->comentario ?>
            </div>
            <div>
                <span class="date"><?php echo DateTime::createFromFormat('Y-m-d', $objecte->fecha)->format("d/m/Y") ?></span>
            </div>
        </div>
        <hr>
    <?php
        }?>
 
</div>