<?php
include 'config.php';

if (isset($_POST['delete_department'])) {
    $id_dept = $_POST['id_dept'];

    // Validasi jika masih ada karyawan di department tersebut
    $sql_check = "SELECT * FROM KARYAWAN WHERE Department = $id_dept";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        echo "Tidak bisa menghapus department karena masih ada karyawan yang terdaftar.";
    } else {
        $sql = "DELETE FROM DEPARTMENT WHERE IDDept = $id_dept";
        if ($conn->query($sql) === TRUE) {
            echo "Department berhasil dihapus.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hapus Department</title>
</head>
<body>
    <h2>Hapus Department</h2>
    <form method="POST">
        <label for="id_dept">ID Department:</label>
        <input type="number" id="id_dept" name="id_dept" required>
        <br>
        <button type="submit" name="delete_department">Hapus Department</button>
    </form>
</body>
</html>
