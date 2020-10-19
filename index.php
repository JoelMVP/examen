<?php
include("actions/conexion.php");
include("layout/header.php");
include("actions/Preferencia.php");

if (isset($_SESSION['login'])) {
    header('Location: home.php');
    exit;
}
?>
<div class="index">
    <h1 class="index__title">Inicar Sesion</h1>
    <div class="index__container">
        <div class="index__circle"></div>
        <form class="index__form" method="POST" action="actions/ingresar.php">
            <div class="index__input">
                <input class="" type="text" name="ci" placeholder="ci" autofocus required>
                <i class="fas fa-user-lock"></i>
            </div>
            <div class="index__input">
                <input class="" type="password" name="password" placeholder="Password" required>
                <i class="fas fa-lock"></i>
            </div>
            <input type="submit" class="index__formBtn" value="Iniciar">
        </form>
    </div>
</div>
<?php
include("layout/footer.php");
?>