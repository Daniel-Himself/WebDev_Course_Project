<?php
$mysqli = new mysqli("localhost", "root", "", "project");
if ($mysqli->connect_error) {
    echo "<h2>error connecting to db</h2>";
    die();
}