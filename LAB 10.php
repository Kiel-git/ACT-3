<?php

$name = $email = $gender = $course = $message = "";
$nameErr = $emailErr = $genderErr = $courseErr = $messageErr = "";
$submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $submitted = true;

    
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $submitted = false;
    } else {
        $name = sanitize_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            $submitted = false;
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $submitted = false;
    } else {
        $email = sanitize_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $submitted = false;
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $submitted = false;
    } else {
        $gender = sanitize_input($_POST["gender"]);
    }
  
    if (empty($_POST["course"])) {
        $courseErr = "Course selection is required";
        $submitted = false;
    } else {
        $course = sanitize_input($_POST["course"]);
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
        $submitted = false;
    } else {
        $message = sanitize_input($_POST["message"]);
    }
}

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab 10: Combined Form</title>
    <style>
        .error {color: #FF0000;}
        .output {margin-top: 20px; padding: 10px; border: 1px solid #ddd;}
    </style>
</head>
<body>

<h2>Lab 10: Combined Form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>

    Email: <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    Gender:
    <input type="radio" name="gender" value="Male" <?php if ($gender=="Male") echo "checked"; ?>> Male
    <input type="radio" name="gender" value="Female" <?php if ($gender=="Female") echo "checked"; ?>> Female
    <input type="radio" name="gender" value="Other" <?php if ($gender=="Other") echo "checked"; ?>> Other
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>

    Course:
    <select name="course">
        <option value="" <?php if ($course=="") echo "selected"; ?>>Select course</option>
        <option value="BSCE" <?php if ($course=="BSCE") echo "selected"; ?>>Bachelor of Science in Civil Engineering (BSCE)</option>
        <option value="BSIT" <?php if ($course=="BSIT") echo "selected"; ?>>Bachelor of Science in Information Technology (BSIT)</option>
        <option value="BSCS" <?php if ($course=="BSCS") echo "selected"; ?>>Bachelor of Science in Computer Science (BSCS)</option>
        <option value="BSBA" <?php if ($course=="BSBA") echo "selected"; ?>>Bachelor of Science in Business Administration (BSBA)</option>
    </select>
    <span class="error">* <?php echo $courseErr;?></span>
    <br><br>

    Message:<br>
    <textarea name="message" rows="5" cols="40"><?php echo $message; ?></textarea>
    <span class="error">* <?php echo $messageErr;?></span>
    <br><br>

    <input type="submit" name="submit" value="Submit">

</form>

<?php

if ($submitted) {
    echo "<div class='output'>";
    echo "<h3>Your Input:</h3>";
    echo "<strong>Name:</strong> " . $name . "<br>";
    echo "<strong>Email:</strong> " . $email . "<br>";
    echo "<strong>Gender:</strong> " . $gender . "<br>";
    echo "<strong>Course:</strong> ";
    switch ($course) {
        case "BSCE":
            echo "Bachelor of Science in Civil Engineering (BSCE)";
            break;
        case "BSIT":
            echo "Bachelor of Science in Information Technology (BSIT)";
            break;
        case "BSCS":
            echo "Bachelor of Science in Computer Science (BSCS)";
            break;
        case "BSBA":
            echo "Bachelor of Science in Business Administration (BSBA)";
            break;
        default:
            echo "Unknown course";
    }
    echo "<br>";
    echo "<strong>Message:</strong> " . nl2br($message) . "<br>";
    echo "</div>";
}
?>

</body>
</html>
