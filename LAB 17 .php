<?php

$name = $email = "";
$nameErr = $emailErr = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $isValid = false;
    } else {
        $name = htmlspecialchars($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } else {
        $email = htmlspecialchars($_POST["email"]);
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $isValid = false;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 17: Required Attribute Simulation (PHP)</title>
</head>
<body>

<h3>Lab 17: Required Attribute Simulation in PHP</h3>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name: <span style="color: red;">*</span></label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>">
    <span style="color:red;"><?php echo $nameErr; ?></span><br><br>

    <label for="email">Email: <span style="color: red;">*</span></label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>">
    <span style="color:red;"><?php echo $emailErr; ?></span><br><br>

    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $isValid) {
    echo "<h4>Form submitted successfully!</h4>";
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
}
?>

</body>
</html>
