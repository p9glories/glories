<?php    

    //GP
    require_once "../../Controladores/SesionesController.php";
    $objecteSessions = new SesionesController();
   
    
    if (!isset($_SESSION["id_usuario"])){
        $_SESSION["login"] = false;
        $_SESSION["mensajeLogin"]= "<< NO LOGUEADO >>";
        header ("location: ../../index.php");
    }else{
        if (isset($_SESSION["rol"]) && $_SESSION["rol"]!="Cliente"){
            $_SESSION["Denegado"]="No tiene acceso al módulo de MODIFICAR la VALORACIÓN!!";
            header ("location: ../../index.php");
        }else{
            //només pot modificar la seva pròpia valoració:
            if(isset($_GET["usuario"]) && ($_GET["usuario"]!=$_SESSION["id_usuario"])){
                $_SESSION["Denegado"]="No tiene acceso a MODIFICAR esta VALORACIÓN!!";
                header ("location: ../../index.php");
            }
        }
    }


?>




<?php
if (isset($_SESSION["login"])){
    if ($_SESSION["login"]==true){
        include '../Includes/header_users.php';
        } 
} 
else {
    header("Location: index.php");
}
?>





<body>

<section class="admin">
    <div class="container">
        <div class="row">
            
        <?php include '../Includes/nav-cuenta-cliente.php';?>
        
            <div class="col-md-9 content">
                
                <div class="row">
                <h2 class="col-12">Modifica tu valoración</h2>


                <!-- -->
                
                <?php 

                if (isset($_GET["id"]) && isset($_GET["tienda"])){
                    ?>
                
                    <div class="col-12">
                      <form class="rating-box mb-4" action="../../Controladores/ValoracionesController.php" method="POST">
                        <div class="row">
                          <div class="rating-stars col-12">
                            <ul id="stars">
                                <li class="star" data-value="1"><i></i></li>
                                <li class="star" data-value="2"><i></i></li>
                                <li class="star" data-value="3"><i></i></li>
                                <li class="star" data-value="4"><i></i></li>
                                <li class="star" data-value="5"> <i></i></li>
                            </ul>
                          <span class="stars-number"></span>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="input-container">
                              <textarea type="text" id="comentario" name="comentario" required="required" rows="3"></textarea>
                              <label for="comentario" class="label">Escribe tu reseña</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="hidden" name="puntuacion" id="puntuacion" value="" required="required">
                            <input type="hidden" name="tienda" value="<?php echo $_GET["tienda"]?>">
                            <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                            <input type="hidden" name="operacio" value="modifica">
                            <input type="submit" class="btn btn-success" value="Modificar valoración">
                        </div>
                      </form>
                    </div>
                    </div>



                        <?php
                }else{
                    echo "NO se puede mostrar";
                }

                ?>

                <!-- -->


                </div>

            </div>
        </div>
        
    </div>
</section>

<?php include '../Includes/footer.php'; ?>

</body>

<script>
        $(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 0) {
        msg = ratingValue + " de 5";
        $('#puntuacion').val(ratingValue);
    }
    responseMessage(msg);
    
  });
  
  
});

function responseMessage(msg) {
  $('.stars-number').fadeIn(200).html("<span>" + msg + "</span>");
}
    </script>

</html>








