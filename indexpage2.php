<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 17.01.18
 * Time: 14:18
 */

echo "Redirect to indexpage2";

$servername = "localhost";
$username = "root";
$passw = "sql123";
$dbname = "testDB";

// Create connection
$conn = new mysqli($servername, $username, $passw, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (name, surname, passw)
 VALUES ('Chuma', 'Zentova', '78kjh45');";
$sql .="INSERT INTO users (name, surname, passw)
 VALUES ('Sergy', 'Monakov', '98kh45');";
$sql .="INSERT INTO users (name, surname, passw)
 VALUES ('Wallet', 'Chmanov', '98vb34');";

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>