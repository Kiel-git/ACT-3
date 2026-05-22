<!DOCTYPE html>
<html>
<body>

<form method="post" action="">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    <input type="submit">
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["name"])) {
        echo "Name is required<br>";
    } else {
        echo "Name: " . $_POST["name"] . "<br>";
    }

    if(empty($_POST["email"])) {
        echo "Email is required<br>";
    } else {
        echo "Email: " . $_POST["email"] . "<br>";
    }
}
?>

</body>
</html
