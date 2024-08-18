<?php
include 'config.php';

// Fungsi untuk menghitung masa kerja
function hitungMasaKerja($tanggal_masuk) {
    $tgl_masuk = new DateTime($tanggal_masuk);
    $tgl_sekarang = new DateTime();
    $interval = $tgl_sekarang->diff($tgl_masuk);

    if ($interval->y > 0) {
        return $interval->y . " Thn, " . $interval->m . " Bulan";
    } else {
        return $interval->m . " Bulan";
    }
}

// Ambil data karyawan dari database, urutkan berdasarkan masa kerja terlama
$sql = "SELECT Nama, Department, Kota_Penempatan, Tanggal_Masuk FROM KARYAWAN ORDER BY Tanggal_Masuk ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Masa Kerja Karyawan</title>
</head>
<body>
    <h2>Laporan Masa Kerja Karyawan</h2>
    <table style="border: 1px solid black;">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Department</th>
            <th>Kota Penempatan</th>
            <th>Masa Kerja</th>
        </tr>
        <?php
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
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="export_excel.php">Export to Excel</a>
</body>
</html>
