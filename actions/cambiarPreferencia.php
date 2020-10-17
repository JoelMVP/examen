<?php
include("conexion.php");
session_start();
if (isset($_POST['save'])) {
    if ($_SESSION['color'] != $_POST['colorS']) {
        $_SESSION['color'] = $_POST['colorS'];
    }
    echo "save";
}
if (isset($_POST['upload'])) {
    echo "upload";
    $image = $_FILES['image']['name'];
    $target = "../img/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
        $_SESSION['imagen'] = $image;
        $sql = "UPDATE usuario SET imagen='$image' where ci='$_SESSION[ci]'";
        mysqli_query($conn, $sql);
    } else {
        $msg = "Failed to upload image";
    }
    echo $msg;
}
header('Location: ../home.php');
