<?php
include 'config.php';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=laporan_masa_kerja.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo '<table border="1">';
echo '<tr><th>No.</th><th>Nama</th><th>Department</th><th>Kota Penempatan</th><th>Masa Kerja</th></tr>';

// Ambil data karyawan dari database, urutkan berdasarkan masa kerja terlama
$sql = "SELECT Nama, Department, Kota_Penempatan, Tanggal_Masuk FROM KARYAWAN ORDER BY Tanggal_Masuk ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['Nama'] . "</td>";
        echo "<td>" . $row['Department'] . "</td>";
        echo "<td>" . $row['Kota_Penempatan'] . "</td>";
        echo "<td>" . hitungMasaKerja($row['Tanggal_Masuk']) . "</td>";
        echo "</tr>";
    }
}
echo '</table>';
?>
