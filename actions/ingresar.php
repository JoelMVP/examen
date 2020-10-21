<?php
session_start();
include("conexion.php");
$ci = $_POST['ci'];
$password = $_POST['password'];
if ($ci == '' or $password == '') {
    echo "debe llenar todos los campos";
} else {
    // $sql = "Select * from usuario where login='$ci' and clave='$password'";
    $sql = "Select * from usuario u, identificador i where login='$ci' and clave='$password' and u.ci=i.ci";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        if (mysqli_num_rows($res)) {
            $row = mysqli_fetch_array($res);
            $_SESSION['ci'] = $row['ci'];
            $_SESSION['clave'] = $row['clave'];
            $_SESSION['login'] = $row['login'];
            $_SESSION['imagen'] = $row['imagen'];
            $_SESSION['color'] = $row['color'];
            $_SESSION['nombre'] = $row['nombreC'];
            $_SESSION['fecha'] = $row['fechaNac'];
            $_SESSION['lugar'] = $row['LugarR'];
            header('Location: ../home.php');
        } else {
            header('Location: ../index.php');
        }
    } else {
        echo "qry err";
    }
}
