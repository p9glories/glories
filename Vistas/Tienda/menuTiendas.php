<!-- Section tiendas inicio -->

<section class="products">
    <div class="container">
        <h2 class="title text-center">Comercios de <b>Restauración</b></h2>
        <div class="row justify-content-center">
            <?php
            foreach($Llistat as $array){ 
                $objecte = (object)$array;
            ?>

            <a class="col-6 col-md-4 box" href="tienda.php?id=<?php echo $objecte->id_tienda ?>">
                <div>
                    <span class="name"><?php echo $objecte->nombre ?></span>
                    <figure><img src="<?php echo $objecte->logo ?>"></figure>
                    <span class="stars stars-0<?php echo $objecte->estrellitas ?>">
                        <span></span><span></span><span></span><span></span><span></span>
                    </span>
                    <span class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, saepe. Rem fugit, quis, nam aliquid odio, quam ullam illum expedita quo modi aut. Accusamus, accusantium, error. Laborum omnis iure, inventore?</span>
                    <span class="btn-container">
                        <span class="btn btn-sm">Seguir leyendo</span>
                    </span>
                </div>
            </a>

            <?php
        }?>
        </div>
    </div>
</section>

<!-- Section tiendas fin -->
