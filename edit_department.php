<?php
include 'config.php';

if (isset($_POST['edit_department'])) {
    $id_dept = $_POST['id_dept'];
    $nama_dept = $_POST['nama_dept'];

    $sql = "UPDATE DEPARTMENT SET Nama_Dept='$nama_dept' WHERE IDDept=$id_dept";
    if ($conn->query($sql) === TRUE) {
        echo "Department updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Department</title>
</head>
<body>
    <h2>Edit Department</h2>
    <form method="POST">
        <label for="id_dept">ID Department:</label>
        <input type="number" id="id_dept" name="id_dept" required>
        <br>
        <label for="nama_dept">Nama Department:</label>
        <input type="text" id="nama_dept" name="nama_dept" required>
        <br>
        <button type="submit" name="edit_department">Update Department</button>
    </form>
</body>
</html>
