<?php
include 'config.php';

if (isset($_POST['add_karyawan'])) {
    $nama = $_POST['nama'];
    $no_ktp = $_POST['no_ktp'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];
    $id_dept = $_POST['id_dept'];

    // Validasi No. KTP yang sama
    $sql_check = "SELECT * FROM KARYAWAN WHERE No_KTP = '$no_ktp'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        echo "Karyawan dengan No. KTP tersebut sudah ada.";
    } else {
        if (!empty($nama) && !empty($no_ktp) && !empty($jabatan) && !empty($gaji) && !empty($id_dept)) {
            $sql = "INSERT INTO KARYAWAN (Nama, No_KTP, Jabatan, Gaji, Department) VALUES ('$nama', '$no_ktp', '$jabatan', $gaji, $id_dept)";
            if ($conn->query($sql) === TRUE) {
                echo "Karyawan baru berhasil ditambahkan.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Semua input harus diisi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Karyawan</title>
</head>
<body>
    <h2>Tambah Karyawan</h2>
    <form method="POST">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        <br>
        <label for="no_ktp">No. KTP:</label>
        <input type="text" id="no_ktp" name="no_ktp" required>
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
        <button type="submit" name="add_karyawan">Tambah Karyawan</button>
    </form>
</body>
</html>
