<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 18.01.18
 * Time: 15:31
 */

//START CODE [
$servername = "localhost";
$username = "root";
$passw = "sql123";
$dbname = "testDB";

$connect = new mysqli($servername, $username, $passw, $dbname);
$sql ="TRUNCATE TABLE message";

if ($connect->query($sql)===TRUE) {
    echo "Deleted all Record";

}
$sql ="TRUNCATE TABLE message_content";

if ($connect->query($sql)===TRUE) {
    echo "Deleted all Record";

}

$connect->close();
header("Location: index.html");


//END CODE ]

