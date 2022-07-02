<?php
$mysqli = new mysqli("localhost", "root", "", "project");
if ($mysqli->connect_error) {
    echo "<h2>error connecting to db</h2>";
    die();
}
$dbName = "project";

if (!$mysqli->select_db($dbName)){
    echo "<p>creating new database</p>";
    $sql = "CREATE DATABASE $dbName";
    if ($mysqli->query($sql)){
        $mysqli->select_db($dbName);
        echo "<p>database $dbName created</p>";
        $sql = 'CREATE TABLE `project`.`users` (`email` VARCHAR(200) NOT NULL , `username` VARCHAR(200) NOT NULL , `password` VARCHAR(200) NOT NULL, `vkey` VARCHAR(200) NOT NULL, `verified` TINYINT NOT NULL DEFAULT 0, PRIMARY KEY (`email`)) ENGINE = InnoDB;';
        if ($mysqli->query($sql)){
            echo "users table created";
        } else {
            echo $mysqli->error;
        }
    };
}