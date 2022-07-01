<?php
$servername = "localhost";
$username="root";
$password = "";
$conn = new mysqli($servername,$username,$password);
if ($conn->connect_error) {
    echo "<h2>error connecting to db</h2>";
    die();
}
$dbName = "project";

if (!$conn->select_db($dbName)){
    echo "<p>creating new database</p>";
    $sql = "CREATE DATABASE $dbName"; // FIX THIS TO CREATE DB
    if ($conn->query($sql)){
        $conn->select_db($dbName);
        echo "<p>database $dbName created</p>";
        "<p>creating users table</p>";
        $sql = 'CREATE TABLE `project`.`users` (`email` VARCHAR(200) NOT NULL , `username` VARCHAR(200) NOT NULL , `password` VARCHAR(200) NOT NULL, PRIMARY KEY (`email`)) ENGINE = InnoDB;';
        if ($conn->query($sql)){
            echo "users table created";
        } else {
            echo $conn->error;
        }
    };
}