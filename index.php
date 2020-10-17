<?php
include("actions/conexion.php");
include("layout/header.php");
?>
<div class="index">
    <form method="POST" action="login.php">
        <input class="" type="text" name="ci" placeholder="ci" autofocus required>
        <input class="" type="password" name="password" placeholder="Password" required>
        <input type="submit" class="" value="enviar">
    </form>
</div>
<a href="aprobados.php">aprobados</a>
<?php
include("layout/footer.php");
?>