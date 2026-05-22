<?php
if (isset($_POST["submit"])) {
    $pass = $_POST["password"];
    echo "Password received (hidden for security)";
}
?>

<form method="post" action="">
    Password: 
    <input type="password" name="password">
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>
