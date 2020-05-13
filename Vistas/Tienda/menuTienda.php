<?php
foreach($Llistat as $array){ 
    $objecte = (object)$array;

                /************************************************ */
                /* veo que las estrellitas solo admiten ENTEROS  */
                /* como lo dejo, redondeo a entero superior ceil(). Si no, seria floor()*/
                /********************************************************************** */
    
?>

<a class="col-6 col-md-4 box" href="tienda.php?id=<?php echo $objecte->id_tienda ?>">
    <div>
        <span class="name"><?php echo $objecte->nombre ?></span>
        
        <?php if($objecte->logo) {
            echo "<figure><img src=".$objecte->logo."></figure>";
        } else {
            echo "<figure class='null'></figure>";
        }?>
        
        <span class="stars stars-0<?php echo ceil($objecte->estrellitas) ?>">
            <span></span><span></span><span></span><span></span><span></span>
        </span>
        <span class="text"><?php echo $objecte->descripcion ?></span>
        <span class="btn-container">
            <span class="btn btn-sm">Seguir leyendo</span>
        </span>
    </div>
</a>

<?php
}
?>

