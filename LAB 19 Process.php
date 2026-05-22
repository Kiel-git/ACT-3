<!DOCTYPE html>
<html>
<head>
    <title>Process Form</title>
</head>

<body>

<h2>Submitted Information</h2>

<?php

$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$gender = htmlspecialchars($_POST["gender"]);
$course = htmlspecialchars($_POST["course"]);
$message = htmlspecialchars($_POST["message"]);

$hobbies = "";

if(isset($_POST["hobbies"])){

    $hobbies = implode(", ", $_POST["hobbies"]);
}
else{
    $hobbies = "No hobbies selected";
}

echo "<strong>Name:</strong> " . $name . "<br><br>";

echo "<strong>Email:</strong> " . $email . "<br><br>";

echo "<strong>Gender:</strong> " . $gender . "<br><br>";

echo "<strong>Course:</strong> " . $course . "<br><br>";

echo "<strong>Hobbies:</strong> " . $hobbies . "<br><br>";

echo "<strong>Message:</strong> " . $message;

?>

</body>
</html>
