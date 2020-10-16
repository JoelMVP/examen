<?php
$conexion = mysqli_connect(
    'localhost',
    'joel',
    '123456',
    'academico'
);
if (isset($conexion)) {
    echo 'La BD esta conectada';
}
