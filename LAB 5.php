<?php

if (isset($_POST["name"]) && isset($_POST["email"])) {

    $name = htmlspecialchars($_POST["name"]);

    $email = htmlspecialchars($_POST["email"]);


    echo "<h3>Secure Output:</h3>";

    echo "Name: " . $name . "<br>";

    echo "Email: " . $email . "<br><br>";

}

?>


<!DOCTYPE html>

<html>

<head>

<title>Lab 5: PREVENT XSS</title>

</head>

<body>


<h2> Lab 5: PREVENT  XSS</h2>


<form method="post" action="">

    Name: <input type="text" name="name"><br><br>

    Email: <input type="email" name="email"><br><br>

    <input type="submit" value="Submit">

</form>
