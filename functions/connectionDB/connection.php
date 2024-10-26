<?php
    $servername = '192.168.1.50';              
    $username = 'nick';
    $password = '';
    $dbname = 'test';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if (mysqli_connect_error()) {
        die("Database connection failed: " .mysqli_connect_error());
    }
    //echo "Connected successfully";
?>