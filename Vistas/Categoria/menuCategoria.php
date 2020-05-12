<!-- Nav inicio -->

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-auto">

         <?php
        foreach($Llistat as $objecte){ 
            ?>
        <li class="nav-item">
            <a class="nav-link" href="categoria.php?id=<?php echo $objecte->id_categoria ?>"><?php echo $objecte->nombre ?></a>
        </li>
        <?php
            }?>
            </ul>
        </div>
    </div>
</nav>

<!-- Nav fin -->
