<?php
$servername = "localhost";
$username = "root"; // Update if different
$password = ""; // Provide your password here if needed
$dbname = "employee_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
    
