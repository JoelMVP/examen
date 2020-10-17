<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
} else {
    // echo "<script>window.alert('Logueado');</script>";
}
include("actions/conexion.php");
include("layout/header.php");
echo "<br />";
echo $_SESSION['ci'];
echo "<br />";
echo $_SESSION['clave'];
echo "<br />";
echo $_SESSION['login'];
echo "<br />";
echo $_SESSION['imagen'];
echo "<br />";
echo $_SESSION['color'];
echo "<br />";
echo $_SESSION['nombre'];
echo "<br />";
echo $_SESSION['fecha'];
echo "<br />";
echo $_SESSION['lugar'];
echo "<br />";
$color = "#000";
if ($_SESSION['color'] == 1) {
    $color = 'orange';
}
if ($_SESSION['color'] == 2) {
    $color = 'rgba(8, 44, 102, 0.7)';
}
if ($_SESSION['color'] == 3) {
    $color = 'rgba(8, 102, 20, 0.7)';
}
?>
<div class="" style="background-color: <?= $color ?>">
    <img src="img/<?= $_SESSION['imagen'] ?>" class="card-img" alt="...">
    <a class="nav-link" href="actions/salir.php">SALIR</a>
    <a href="aprobados.php">aprobados</a>
</div>
<form action="actions/cambiarPreferencia.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" id="">
    <button type="submit" name="upload" class="btn btn-primary my-1">Provar</button>
    <select selected="3" name="colorS">
        <option value="1" <?php if ($_SESSION['color'] == '1') {
                                echo ("selected");
                            } ?> style="background: #ff6702; color: #fff;">Naranja</option>
        <option value="2" <?php if ($_SESSION['color'] == '2') {
                                echo ("selected");
                            } ?> style="background: #0012b4; color: #fff;">Azul</option>
        <option value="3" <?php if ($_SESSION['color'] == '3') {
                                echo ("selected");
                            } ?> style="background: #007737; color: #fff;">Verde</option>
    </select>
    <button type="submit" name="save" class="btn btn-primary my-1">Guardar cambios</button>
</form>
<?php
include("layout/footer.php");
?>