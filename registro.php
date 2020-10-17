<?php
include("actions/conexion.php");
include("layout/header.php");
?>
<div class="registro">
    <form method="POST" action="">
        <input class="" type="text" name="ci" placeholder="ci" autofocus required>
        <input class="" type="password" name="password" placeholder="Password" required>
        <input type="submit" class="" name="registrar" value="Registrarme">
    </form>
</div>
<a href="aprobados.php">aprobados</a>
<?php
include("layout/footer.php");
?>