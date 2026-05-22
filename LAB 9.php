<!DOCTYPE html>
<html>
<head>
    <title>Lab 9: Textarea Input</title>
</head>
<body>

<?php
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = htmlspecialchars($_POST['message']);
}
?>

<form method="post" action="">
    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="5" cols="40"></textarea><br><br>
    <input type="submit" value="Submit">
</form>

<?php
if (!empty($message)) {
    echo "<h3>Your message:</h3>";
    echo "<p>" . $message . "</p>";
}
?>

</body>
</html>
