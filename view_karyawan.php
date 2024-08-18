<?php
include 'config.php';

$sql = "SELECT * FROM KARYAWAN";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Karyawan</title>
</head>
<body>
    <h2>Daftar Karyawan</h2>
    <table style="border: 1px solid black;">
    <tr>
        <th>ID Department</th>
        <th>Nama Department</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['IDDept'] . "</td>
                    <td>" . $row['Nama_Dept'] . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No data found</td></tr>";
    }
    ?>
</table>

</body>
</html>
