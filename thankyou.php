<?php
// Tell user to check their mailbox
$vkey = $_GET['vkey'];
echo "<h2>Please click the link below to verify your account: <a href='./verify.php?vkey=$vkey'>Verify Account</a></h2>";
?>