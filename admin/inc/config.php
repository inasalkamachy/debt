

<?php

session_start();
$servername = "localhost";
$username = "enas";
$password = "enas0000";
$dbname = "sulaf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");//to change the insert record to arabic lang.ا

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}