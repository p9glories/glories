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
} 
else {
    header("Location: index.php");
}
?>

<body>

<section class="admin">
    <div class="container">
        <div class="row">
        
        <?php include 'Includes/nav-cuenta-superadmin.php';?>
        
            <div class="col-md-9 content">
                    
                <?php if (isset($_SESSION["mensajeResultado"])){
                    echo "<div class='row'><div class='col-12'><span class='msg'>".$_SESSION["mensajeResultado"]."</span></div></div>";
                    unset($_SESSION["mensajeResultado"]);

                };
                ?>
                <form id="form" action="../../Controladores/UsuariosController.php" method="POST">
                    <div class="row">
                        <h2 class="col-12">Cambiar contraseña</h2>
                        <p class="col-12">Ingresa tu nueva contraseña:</p>
                            
                        <div class="col-md-6 mb-3">
                            <div class="input-container">
                                <input type="text" id="password" name="password" required="required">
                                <label for="password" class="label">Nueva contraseña</label>
                            </div>
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id_usuario']?>">
                        <input type="hidden" name="operacio" value="modificarPasswd">

                        <div class="col-md-12 mb-3">
                            <input type="submit" class="btn btn-secondary" value="Modificar contraseña">
                        </div>
                    </div>
                </form>   

            </div>
        </div>
    </div>
</section>

<?php include 'Includes/footer.php'; ?>

</body>

</html>
