<?php
$conn = new mysqli("127.0.0.1", "root", "","anwesha_drives");
//$conn = new mysqli("127.0.0.1", "root", "password","anwesha_drives");
//$conn = new mysqli("localhost", "anwesha_drives", "anwesha_drives","anwesha_drives");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> 