<?php
//GP
require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();
?>

<?php
    include 'Includes/header.php';
?>

<body>

<section class="admin">
    <div class="container mt-5 mb-5">
        
        <form class="text-center" action="../../Controladores/ClientesController.php" method="POST">
        <div class="row">
            <h3 class="col-12 mb-3 fw-600"><span class="c-orange">Registro de</span> nuevo cliente</h3>
            <div class="col-md-6 offset-md-3 mb-3">
                <div class="input-container">
                    <input type="text" id="email" name="email" required="required">
                    <label for="email" class="label">Tu e-mail</label>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <div class="input-container">
                    <input type="text" id="password" name="password" required="required">
                    <label for="password" class="label">Contraseña</label>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <div class="input-container">
                    <input type="text" id="nombre" name="nombre" required="required">
                    <label for="nombre" class="label">Nombre</label>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <div class="input-container">
                    <input type="text" id="apellidos" name="apellidos" required="required">
                    <label for="apellidos" class="label">Apellidos</label>
                </div>
            </div>
            <div class="col-md-6 offset-md-3 mb-4">
                <div class="input-container">
                    <input type="text" id="telefono" name="telefono" required="required">
                    <label for="telefono" class="label">Teléfono</label>
                </div>
            </div>
            <div class="form-check col-md-6 offset-md-3 mb-4">
                <input type="checkbox" class="form-check-input" id="news" checked="checked">
                <label class="form-check-label" for="news">Quiero suscribirme a la newsLetter</label>
            </div>
            <div class="col-md-6 offset-md-3 mb-3">
                <a href="javascript:void(0)" onclick="goBack()" class="btn btn-light">Cancelar</a>
                <input type="hidden" name="newsletter" id="newsletter" value="1">
                <input type="hidden" name="operacio" value="inserta">
                <input type="submit" class="btn btn-success" value="Registrarme">
            </div>
        </div>
        </form>

    </div>
</section>

<?php include 'Includes/footer.php'; ?>

</body>

<script>
    $('#news').on('change',function(){
        var checked=this.checked;
        if(checked==true) {
            $('#newsletter').val('0');
            }
        else {
            $('#newsletter').val('1');
        }
    });
    function goBack() {
      window.history.back();
    }
</script>
</html>