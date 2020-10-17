<?php
include("actions/conexion.php");
include("layout/header.php");

$sql = "SELECT
sum(case when a.LugarR like '01' then 1 else 0 end) Chuquisaca,
sum(case when a.LugarR like '02' then 1 else 0 end) LaPaz,
sum(case when a.LugarR like '03' then 1 else 0 end) Cochabamba,
sum(case when a.LugarR like '04' then 1 else 0 end) Oruro,
sum(case when a.LugarR like '05' then 1 else 0 end) Potosi,
sum(case when a.LugarR like '06' then 1 else 0 end) Tarija,
sum(case when a.LugarR like '07' then 1 else 0 end) SantaCruz,
sum(case when a.LugarR like '08' then 1 else 0 end) Beni,
sum(case when a.LugarR like '09' then 1 else 0 end) Pando
FROM (SELECT ci,LugarR FROM identificador) as a, notas as n 
where a.ci like n.ci and n.nota > 50";
$resultado = mysqli_query($conn, $sql);

?>
<table border="1px">
    <tr>
        <td>Chuquisaca</td>
        <td>LaPaz</td>
        <td>Cochabamba</td>
        <td>Oruro</td>
        <td>Potosi</td>
        <td>Tarija</td>
        <td>SantaCruz</td>
        <td>Beni</td>
        <td>Pando</td>
    </tr>
    <?php
    while ($fila = mysqli_fetch_row($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila[0] . "</td>";
        echo "<td>" . $fila[1] . "</td>";
        echo "<td>" . $fila[2] . "</td>";
        echo "<td>" . $fila[3] . "</td>";
        echo "<td>" . $fila[4] . "</td>";
        echo "<td>" . $fila[5] . "</td>";
        echo "<td>" . $fila[6] . "</td>";
        echo "<td>" . $fila[7] . "</td>";
        echo "<td>" . $fila[8] . "</td>";
        echo "<tr>";
    }
    ?>
</table>
<a href="index.php">Inicio</a>
<?php
include("layout/footer.php");
?>