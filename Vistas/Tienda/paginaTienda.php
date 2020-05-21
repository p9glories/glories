<?php
foreach($Llistat as $array){ 
    $objecte = (object)$array;
?>

<!-- -->
<div class="col-md-6 order-md-2 order-sm-1">
    <div class="gallery" gallery>
        <div class="row">
            <div class="col-12 main" main>
                <figure>
                <?php if ($objecte->foto1) {
                    echo '<img src="../imagenes/'.$objecte->foto1.'">';
                } else {
                    echo '<img src="../imagenes/no-image.jpg">';
                }
                ?>   
                </figure>
            </div>
            <div class="col-12 thumbs" thumbs>
                <div class="row">
                    <div class="col-4 li">
                        <figure>
                        <?php if ($objecte->foto1) {
                            echo '<img src="../imagenes/'.$objecte->foto1.'">';
                        } else {
                            echo '<img src="../imagenes/no-image.jpg">';
                        }
                        ?>   
                        </figure>
                    </div>
                    <div class="col-4 li">
                        <figure>
                        <?php if ($objecte->foto2) {
                            echo '<img src="../imagenes/'.$objecte->foto2.'">';
                        } else {
                            echo '<img src="../imagenes/no-image.jpg">';
                        }
                        ?>   
                        </figure>
                    </div>
                    <div class="col-4 li">
                        <figure>
                        <?php if ($objecte->foto3) {
                            echo '<img src="../imagenes/'.$objecte->foto3.'">';
                        } else {
                            echo '<img src="../imagenes/no-image.jpg">';
                        }
                        ?>   
                        </figure>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- -->
<div class="col-md-6 order-md-1 order-sm-2">
    <!-- -->
    <div class="info mb-3">
        <div class="breadcrumbs">
            <a href="index.php">Inicio</a>
            <i></i>
                <?php
                $categoriaTitulo = new CategoriasController();
                $nombreCategoria = $categoriaTitulo->obtieneNombreDeLaCategoria($objecte->id_categoria);
                echo "<a href='categoria.php?id=".$objecte->id_categoria."'>";
                echo $nombreCategoria;
                echo "</a>";
                ?>
            <i></i>
        </div>
        <div class="title">
            <div class="name"><?php echo $objecte->nombre ?></div>

            <figure>
            <?php if ($objecte->logo) {
                echo '<img src="../imagenes/'.$objecte->logo.'">';
            } else {
                echo '<img src="../imagenes/no-image.jpg">';
            }
            ?>   
            </figure>

            <span class="stars stars-0<?php echo ceil($objecte->estrellitas) ?>">
                <span></span><span></span><span></span><span></span><span></span>
            </span>
            <span class="votes">
            <?php 
            $cantValoraciones = new ValoracionesController();
            $cifraValoraciones = $cantValoraciones->obtieneCantValoracionesAprobadas($objecte->id_tienda);
            echo $cifraValoraciones?>
            valoraciones</span>
        </div>
        <div class="description">
            <?php echo $objecte->descripcion ?>
        </div>
        <div class="data row">
            <div class="col-3">
                Horario:
            </div>
            <div class="col-9">
                <?php echo $objecte->horario ?>
            </div>
            <div class="col-3">
                Ubicación:
            </div>
            <div class="col-9">
                <?php echo $objecte->ubicacion ?>
            </div>
            <div class="col-3">
                Teléfono:
            </div>
            <div class="col-9">
                <?php echo $objecte->telefono ?>
            </div>
        </div>
    </div>
<!-- -->

<?php
}?>

