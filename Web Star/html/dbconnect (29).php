<?php
$servername = "localhost";
$username   = "crimsonw_webstar";
$password   = "mR2Ug08fqGVb";
$dbname     = "crimsonw_webstardb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>