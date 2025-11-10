<?php
// ====== Local ======= //
$servername = "localhost";  // from your MySQL settings
$username = "root";        // your username
$password = "";           // your db password
$dbname = "ems";         // db name

// ====== Live ======= //
// $servername = "sql111.infinityfree.com";  // from your MySQL settings
// $username = "if0_40340974";       	 // your username
// $password = "Avi24lash35";              // your db password
// $dbname = "if0_40340974_ems";          // db name

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
