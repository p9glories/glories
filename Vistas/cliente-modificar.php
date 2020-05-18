<?php
//GP
require_once "../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();
?>

<?php
if (isset($_SESSION["login"])){
    if ($_SESSION["login"]==true){
        include 'Includes/header_users.php';
        } 
    else {
        include 'Includes/header.php';
    }
} 
else {
    include 'Includes/header.php';
}
?>

<body>
<section class="admin">
    <div class="container">
        <div class="row">
        
        <?php include 'Includes/nav-cuenta-cliente.php';?>
        
            <div class="col-md-9 content">
                    
                <?php if (isset($_SESSION["mensajeResultado"])){
                    echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeResultado"]."</span></div></div>";
                    unset($_SESSION["mensajeResultado"]);
                };
                ?>
            
                <form id="form" action="../Controladores/UsuariosController.php" method="POST">
                    <div class="row">
                        <h2 class="col-12">Modificar datos personales</h2>
                            
                        <?php
                        include '../Controladores/ClientesController.php'; 
                        $objecte = new ClientesController();
                        $objecte->mostrarModificarCliente();
                        ?>
                        
                        <input type="hidden" name="newsletter" id="newsletter" value="1">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id_usuario']?>">
                        <input type="hidden" name="operacio" value="modificarClient">

                        <div class="col-md-12 mb-3">

                            <input type="submit" class="btn btn-success" value="Modificar">
                            <a href="cliente-perfil.php" class="btn btn-light">Cancelar</a>
                        </div>

                    </div>

                </form>   

            </div>
        </div>
    </div>
</section>

<?php include 'Includes/footer.php'; ?>

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
</script>

</body>

</html>