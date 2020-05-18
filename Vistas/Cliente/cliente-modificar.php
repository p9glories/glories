<?php foreach($Llistat as $objecte){ 
    ?>

    <div class="col-md-6 mb-3">
      <div class="input-container">
        <input type="text" name="nombre" value="<?php echo $objecte->nombre ?>">
        <label class="label" for="nombre">Nombre</label>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <div class="input-container">
        <input type="text" name="apellidos" value="<?php echo $objecte->apellidos ?>">
        <label class="label" for="apellidos">Apellidos</label>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <div class="input-container">
        <input type="text" name="email" value="<?php echo $objecte->email ?>">
        <label class="label" for="email">E-mail</label>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <div class="input-container">
        <input type="text" name="telefono" value="<?php echo $objecte->telefono ?>">
        <label class="label" for="telefono">Teléfono</label>
      </div>
    </div>
    
    <div class="form-check col-md-12 mb-4">

      <?php if ($objecte->newsletter == 0) {
        echo '<input type="checkbox" class="form-check-input" id="news">';
      } else {
        echo '<input type="checkbox" class="form-check-input" id="news" checked="checked">';
      }
      ?>

      <label class="form-check-label" for="news">Suscripción a nuestra newsletter</label>


    </div>


      
<?php
}?>

