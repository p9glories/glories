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
                    <img src="https://scontent.fmad7-1.fna.fbcdn.net/v/t31.0-8/23632100_10155211486013506_6483325655654681337_o.jpg?_nc_cat=100&_nc_sid=8024bb&_nc_oc=AQn71EVoyPaTilRqVxOCOoOiNj_9-Nz3JZBSzWCCnvW2MR2IHFr6_E-i7Yx_wBd_uLU&_nc_ht=scontent.fmad7-1.fna&oh=807c4eb7b56eb8b66ea0ddbcd2c8a098&oe=5ED63D95">
                </figure>
            </div>
            <div class="col-12 thumbs" thumbs>
                <div class="row">
                    <div class="col-4 li">
                        <figure>
                            <img src="https://scontent.fmad7-1.fna.fbcdn.net/v/t31.0-8/23632100_10155211486013506_6483325655654681337_o.jpg?_nc_cat=100&_nc_sid=8024bb&_nc_oc=AQn71EVoyPaTilRqVxOCOoOiNj_9-Nz3JZBSzWCCnvW2MR2IHFr6_E-i7Yx_wBd_uLU&_nc_ht=scontent.fmad7-1.fna&oh=807c4eb7b56eb8b66ea0ddbcd2c8a098&oe=5ED63D95">
                        </figure>
                    </div>
                    <div class="col-4 li">
                        <figure>
                            <img src="https://gloriagastronomicavideo.files.wordpress.com/2019/05/img_8744.jpg?w=1024">
                        </figure>
                    </div>
                    <div class="col-4 li">
                        <figure>
                            <img src="https://www.modaes.es/files/000_2016/0109recursos/glories-renovado-barcelona-728.jpg">
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

            <?php if($objecte->logo) {
                echo "<figure><img src=".$objecte->logo."></figure>";
            } else {
                echo "<figure class='null'></figure>";
            }?>

            <span class="stars stars-0<?php echo ceil($objecte->estrellitas) ?>">
                <span></span><span></span><span></span><span></span><span></span>
            </span>
            <span class="votes">XX valoraciones</span>
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

