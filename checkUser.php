<?php
require('db.php');
$insert = $mysqli->query("INSERT INTO users (email, username, password, vkey) VALUES ('$e', '$u', '$p', '$vkey')");
$mysqli->select_db($dbName);
echo "<p>database $dbName created</p>";
if ($mysqli->query($sql)){
    echo "users table created";
} else {
    echo $mysqli->error;
}

