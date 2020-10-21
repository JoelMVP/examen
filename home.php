<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}
include("actions/conexion.php");
include("layout/header.php");
include("actions/Preferencia.php");
?>
<div class="index">
    <div class="home__title">
        <h1 class="home__h1">Usuario: <?= $_SESSION['login'] ?> </h1>
        <a class="nav-link" href="actions/salir.php">Cerrar Sesion</a>
    </div>
    <form action="actions/cambiarPreferencia.php" class="home__form" method="POST" enctype="multipart/form-data">
        <div class="home__body">
            <div class="home__data">
                <span>CI</span>
                <div class="data__container">
                    <span>
                        <?= $_SESSION['ci'] ?>
                    </span>
                    <i class="fas fa-id-card"></i>
                </div>
                <span>Nombre Completo</span>
                <div class="data__container">
                    <span>
                        <?= $_SESSION['nombre'] ?>
                    </span>
                    <i class="fas fa-user"></i>
                </div>
                <span>Cuidad</span>
                <div class="data__container">
                    <span>
                        <?= $_SESSION['lugar'] ?>
                    </span>
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <span>Fecha de Nacimiento</span>
                <div class="data__container">
                    <span>
                        <?= $_SESSION['fecha'] ?>
                    </span>
                    <i class="fas fa-calendar-day"></i>
                </div>
            </div>
            <div class="home__options">
                <img src="img/<?= $_SESSION['imagen'] ?>" class="home__img">
                <div class="home__file">
                    <span class="texto">Cargar Imagen</span>
                    <input type="file" name="image" class="btn_enviar">
                </div>
                <select class="home__select" selected="3" name="colorS">
                    <option value="1" <?php if ($_SESSION['color'] == '1') {
                                            echo ("selected");
                                        } ?>>tema 1</option>
                    <option value="2" <?php if ($_SESSION['color'] == '2') {
                                            echo ("selected");
                                        } ?>>tema 2</option>
                    <option value="3" <?php if ($_SESSION['color'] == '3') {
                                            echo ("selected");
                                        } ?>>tema 3</option>
                </select>
                <button type="submit" name="upload" class="home__provarBtn">Provar</button>
            </div>
        </div>
        <button type="submit" name="save" class="home__saveBtn">Guardar cambios</button>
    </form>
</div>
<?php
include("layout/footer.php");
?>