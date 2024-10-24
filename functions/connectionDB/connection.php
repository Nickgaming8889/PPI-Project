<?php
    $servername = 'localhost';              
    $username = 'nicholas';
    $password = '1968';
    $dbname = 'test';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if (mysqli_connect_error()) {
        die("Database connection failed: " .mysqli_connect_error());
    }
    echo "Connected successfully";
?>