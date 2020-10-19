<?php
include("conexion.php");
session_start();
if (isset($_POST['upload'])) {
    echo "upload";
    $image = $_FILES['image']['name'];
    $target = "../img/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
        $_SESSION['imagen'] = $image;
    } else {
        $msg = "Failed to upload image";
    }
    echo $msg;
    if ($_SESSION['color'] != $_POST['colorS']) {
        $_SESSION['color'] = $_POST['colorS'];
    }
}
if (isset($_POST['save'])) {
    if ($_SESSION['color'] != $_POST['colorS']) {
        $_SESSION['color'] = $_POST['colorS'];
    }
    $image = $_FILES['image']['name'];
    if ($image != $_SESSION['imagen']) {
        $target = "../img/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
            $_SESSION['imagen'] = $image;
        } else {
            $msg = "Failed to upload image";
        }
    }
    $sql = "UPDATE usuario SET imagen='$_SESSION[imagen]', color='$_SESSION[color]' where ci='$_SESSION[ci]'";
    mysqli_query($conn, $sql);
    echo "save";
    echo $sql;
}
header('Location: ../home.php');
