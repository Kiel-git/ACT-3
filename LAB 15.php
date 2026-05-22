<?php

$name = $email = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reset'])) {
        
        $name = "";
        $email = "";
    } else {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 15: PHP Form Reset Button</title>
</head>
<body>

<h3>Lab 15: Form with Reset Button (PHP)</h3>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br><br>
    
    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="reset" value="Reset">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    echo "<h4>Submitted Data:</h4>";
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
}
?>

</body>
</html>
