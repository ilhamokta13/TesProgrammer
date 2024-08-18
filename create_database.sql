-- Membuat database employee_management
CREATE DATABASE employee_management;

-- Menggunakan database employee_management
USE employee_management;

-- Membuat tabel DEPARTMENT
CREATE TABLE DEPARTMENT (
    IDDept INT AUTO_INCREMENT PRIMARY KEY,
    Nama_Dept VARCHAR(255) NOT NULL
);

-- Membuat tabel KARYAWAN
CREATE TABLE KARYAWAN (
    IDKaryawan INT AUTO_INCREMENT PRIMARY KEY,
    Nama VARCHAR(255) NOT NULL,
    No_KTP VARCHAR(20) NOT NULL UNIQUE,
    Jabatan VARCHAR(255) NOT NULL,
    Gaji DECIMAL(15, 2) NOT NULL,
    Department INT,
    Kota_Penempatan VARCHAR(255),
    Tanggal_Masuk DATE NOT NULL,
    FOREIGN KEY (Department) REFERENCES DEPARTMENT(IDDept)
);

-- Insert data contoh ke tabel DEPARTMENT
INSERT INTO DEPARTMENT (Nama_Dept) VALUES
('Accounting'),
('Marketing'),
('Produksi');

-- Insert data contoh ke tabel KARYAWAN
INSERT INTO KARYAWAN (Nama, No_KTP, Jabatan, Gaji, Department, Kota_Penempatan, Tanggal_Masuk) VALUES
('Budi', '1234567890123456', 'Manager', 5000000, 1, 'Surabaya', '2022-05-01'),
('David', '1234567890123457', 'Staff', 3000000, 2, 'Surabaya', '2023-02-15'),
('Fajar', '1234567890123458', 'Supervisor', 4500000, 3, 'Nganjuk', '2023-10-01');
