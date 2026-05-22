<?php
if (isset($_POST["email"])) {
    $email = $_POST["email"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Valid email: " . $email;
    } else {
        echo "Invalid email";
    }
}
?>

<form method="post" action="">
    Email: <input type="text" name="email"><br><br>
    <input type="submit" value="Submit">
</form>
