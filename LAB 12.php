<?php

$name = $email = $gender = $course = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : "";
    $course = isset($_POST['course']) ? htmlspecialchars($_POST['course']) : "";
    $message = htmlspecialchars($_POST['message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sticky Form - Lab 12</title>
</head>
<body>

<h2>Sticky Form</h2>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo $name; ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo $email; ?>"><br><br>

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>> Male
    <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>> Female<br><br>

    <label>Course:</label><br>
    <select name="course">
        <option value="">Select a course</option>
        <option value="BSIT" <?php if ($course == "BSIT") echo "selected"; ?>>BSIT</option>
        <option value="BSCE" <?php if ($course == "BSCE") echo "selected"; ?>>BSCE</option>
        <option value="BSBA" <?php if ($course == "BSBA") echo "selected"; ?>>BSBA</option>
        <option value="BSED" <?php if ($course == "BSED") echo "selected"; ?>>BSED</option>
    </select><br><br>

    <label>Message:</label><br>
    <textarea name="message"><?php echo $message; ?></textarea><br><br>

    <input type="submit" value="Submit">

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h3>Submitted Data</h3>";
    echo "<strong>Name:</strong> " . $name . "<br>";
    echo "<strong>Email:</strong> " . $email . "<br>";
    echo "<strong>Gender:</strong> " . $gender . "<br>";
    echo "<strong>Course:</strong> " . $course . "<br>";
    echo "<strong>Message:</strong> " . nl2br($message) . "<br>";
}
?>

</body>
</html>
