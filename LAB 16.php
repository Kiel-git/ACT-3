<?php

$age = "";
$ageErr = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = $_POST["age"];
        
        if (!is_numeric($age)) {
            $ageErr = "Age must be a number";
        } else {
            
            $age = (int)$age;
        
            if ($age < 1 || $age > 120) {
                $ageErr = "Age must be between 1 and 120";
            } else {
                $message = "Your age is: " . $age;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 16: Number Input Validation</title>
</head>
<body>

<h3>Lab 16: Number Input Validation (PHP)</h3>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="age">Enter your age:</label>
    <input type="text" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>">
    <span style="color: red;"><?php echo $ageErr; ?></span><br><br>
    
    <input type="submit" value="Submit">
</form>

<?php
if ($message) {
    echo "<h4>$message</h4>";
}
?>

</body>
</html>
