<!-- Section links inicio -->

<section class="links">
    <div class="container">
        <h2 class="title text-center">Conoce <b>nuestras tiendas</b></h2>
        <p class="text-center">Amplia gama de comercios sólo para ti</p>
        <div class="row justify-content-center">
            
    <?php
        foreach($Llistat as $objecte){ 
            ?>
            <a class="col-6 col-md-2 box" href="categoria.php?id=<?php echo $objecte->id_categoria ?>">
                <figure>
                <?php if ($objecte->icono) {
                    echo '<img src="../imagenes/'.$objecte->icono.'">';
                } else {
                    echo '<img src="../imagenes/no-image.jpg">';
                }
                ?>   
                </figure>
                <span><?php echo $objecte->nombre ?></span>
            </a>
    <?php
        }?>



        </div>
    </div>
</section>

<!-- Section links fin -->