<?php
if(isset($_GET['vkey'])){
    // Process verification
    $vkey = $_GET['vkey'];
    $mysqli = new mysqli("localhost", "root", "", "project");

    $resultSet = $mysqli->query("SELECT verified,vkey FROM users WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");

    if($resultSet->num_rows == 1){
        // Validate the email
        $update = $mysqli->query("UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");

        if($update){
            echo "<h2>Your account has been verified. You can now log in via the <a href='login_page.php'>login page</a>.</h2>";
        } else {
            echo $mysqli->error;
        }
    }
}else{
    // No verification key
    die("No verification key");
}

?>
