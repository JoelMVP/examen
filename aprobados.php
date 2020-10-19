<?php
include("actions/conexion.php");
include("layout/header.php");
include("actions/Preferencia.php");

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
<div class="index">
    <h1 class="index__title">Aprobados por Departamento</h1>
    <table class="table__body">
        <thead>
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
        </thead>
        <tbody>
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
        </tbody>
    </table>

    <table class="table__body">
        <thead>
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
        </thead>
        <tbody>
            <?php
            $sum = [0, 0, 0, 0, 0, 0, 0, 0, 0];
            $sql = "SELECT * FROM identificador";
            $resultado = mysqli_query($conn, $sql);
            while ($con = mysqli_fetch_row($resultado)) {
                $sql1 = "SELECT * FROM notas";
                $resultado1 = mysqli_query($conn, $sql1);
                while ($fila1 = mysqli_fetch_row($resultado1)) {
                    if ($con[0] == $fila1[1] && $fila1[3] > 50) {
                        $sum[$con[3] - 1] += 1;
                    }
                }
            }
            echo "<tr>";
            for ($i = 0; $i < 9; $i++) {
                echo "<td>" . $sum[$i] . "</td>";
            }
            echo "<tr>";
            ?>
        </tbody>
    </table>
</div>
<?php
include("layout/footer.php");
?>