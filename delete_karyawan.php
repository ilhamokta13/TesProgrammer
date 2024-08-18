<?php
include 'config.php';

if (isset($_POST['delete_karyawan'])) {
    $id_karyawan = $_POST['id_karyawan'];

    $sql = "DELETE FROM KARYAWAN WHERE IDKaryawan=$id_karyawan";
    if ($conn->query($sql) === TRUE) {
        echo "Employee deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hapus Karyawan</title>
</head>
<body>
    <h2>Hapus Karyawan</h2>
    <form method="POST">
        <label for="id_karyawan">ID Karyawan:</label>
        <input type="number" id="id_karyawan" name="id_karyawan" required>
        <br>
        <button type="submit" name="delete_karyawan">Hapus Karyawan</button>
    </form>
</body>
</html>
