<?php
include 'config.php';

if (isset($_POST['edit_karyawan'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];
    $id_dept = $_POST['id_dept'];

    $sql = "UPDATE KARYAWAN SET Jabatan='$jabatan', Gaji=$gaji, Department=$id_dept WHERE IDKaryawan=$id_karyawan";
    if ($conn->query($sql) === TRUE) {
        echo "Data karyawan berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Karyawan</title>
</head>
<body>
    <h2>Edit Karyawan</h2>
    <form method="POST">
        <label for="id_karyawan">ID Karyawan:</label>
        <input type="number" id="id_karyawan" name="id_karyawan" required>
        <br>
        <label for="jabatan">Jabatan:</label>
        <input type="text" id="jabatan" name="jabatan" required>
        <br>
        <label for="gaji">Gaji:</label>
        <input type="number" id="gaji" name="gaji" required>
        <br>
        <label for="id_dept">Department:</label>
        <input type="number" id="id_dept" name="id_dept" required>
        <br>
        <button type="submit" name="edit_karyawan">Update Karyawan</button>
    </form>
</body>
</html>
