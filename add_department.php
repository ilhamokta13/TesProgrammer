<?php
include 'config.php';

if (isset($_POST['add_department'])) {
    $nama_dept = $_POST['nama_dept'];

    // Validasi nama department yang sama
    $sql_check = "SELECT * FROM DEPARTMENT WHERE Nama_Dept = '$nama_dept'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        echo "Department dengan nama tersebut sudah ada.";
    } else {
        $sql = "INSERT INTO DEPARTMENT (Nama_Dept) VALUES ('$nama_dept')";
        if ($conn->query($sql) === TRUE) {
            echo "Department baru berhasil ditambahkan.";
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
    <title>Tambah Department</title>
</head>
<body>
    <h2>Tambah Department</h2>
    <form method="POST">
        <label for="nama_dept">Nama Department:</label>
        <input type="text" id="nama_dept" name="nama_dept" required>
        <br>
        <button type="submit" name="add_department">Tambah Department</button>
    </form>
</body>
</html>
