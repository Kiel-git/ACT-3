<!DOCTYPE html>
<html>
<head>
    <title>Lab 20 - Student Registration Form</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container{
            width: 450px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
        }

        h2{
            text-align: center;
        }

        input[type=text],
        select,
        textarea{
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        textarea{
            height: 80px;
        }

        input[type=submit]{
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type=submit]:hover{
            background-color: #45a049;
        }

        .error{
            color: red;
            font-size: 14px;
        }

        .output{
            margin-top: 20px;
            background-color: #e7ffe7;
            padding: 15px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="container">

<h2>Student Registration Form</h2>

<?php

$name = "";
$email = "";
$gender = "";
$course = "";
$message = "";
$hobbies = [];

$nameErr = "";
$emailErr = "";
$genderErr = "";
$courseErr = "";
$messageErr = "";

function clean_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["name"])){
        $nameErr = "Name is required";
    }
    else{
        $name = clean_input($_POST["name"]);
    }

    if(empty($_POST["email"])){
        $emailErr = "Email is required";
    }
    else{
        $email = clean_input($_POST["email"]);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invalid email format";
        }
    }

    if(empty($_POST["gender"])){
        $genderErr = "Gender is required";
    }
    else{
        $gender = clean_input($_POST["gender"]);
    }

    if(empty($_POST["course"])){
        $courseErr = "Course is required";
    }
    else{
        $course = clean_input($_POST["course"]);
    }

    if(isset($_POST["hobbies"])){
        $hobbies = $_POST["hobbies"];
    }

    if(empty($_POST["message"])){
        $messageErr = "Message is required";
    }
    else{
        $message = clean_input($_POST["message"]);
    }
}

?>

<form method="POST" action="">

    Name:
    <input type="text" name="name"
    value="<?php echo $name; ?>">

    <span class="error">
        <?php echo $nameErr; ?>
    </span>

    Email:
    <input type="text" name="email"
    value="<?php echo $email; ?>">

    <span class="error">
        <?php echo $emailErr; ?>
    </span>

    Gender:
    <br>

    <input type="radio" name="gender" value="Male"
    <?php if($gender == "Male") echo "checked"; ?>>
    Male

    <input type="radio" name="gender" value="Female"
    <?php if($gender == "Female") echo "checked"; ?>>
    Female

    <br>

    <span class="error">
        <?php echo $genderErr; ?>
    </span>

    <br><br>

    Course:
    <select name="course">

        <option value="">Select Course</option>

        <option value="BSIT"
        <?php if($course == "BSIT") echo "selected"; ?>>
        BSIT
        </option>

        <option value="BSCS"
        <?php if($course == "BSCS") echo "selected"; ?>>
        BSCS
        </option>

        <option value="BSEDUC"
        <?php if($course == "BSEDUC") echo "selected"; ?>>
        BSEDUC
        </option>

    </select>

    <span class="error">
        <?php echo $courseErr; ?>
    </span>

    Hobbies:
    <br>

    <input type="checkbox" name="hobbies[]" value="Reading">
    Reading

    <input type="checkbox" name="hobbies[]" value="Gaming">
    Gaming

    <input type="checkbox" name="hobbies[]" value="Sports">
    Sports

    <br><br>

    Message:
    <textarea name="message"><?php echo $message; ?></textarea>

    <span class="error">
        <?php echo $messageErr; ?>
    </span>

    <br><br>

    <input type="submit" value="Register">

</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST" &&
   empty($nameErr) &&
   empty($emailErr) &&
   empty($genderErr) &&
   empty($courseErr) &&
   empty($messageErr))
{
    echo "<div class='output'>";

    echo "<h3>Registration Successful!</h3>";

    echo "<strong>Name:</strong> " . $name . "<br>";
    echo "<strong>Email:</strong> " . $email . "<br>";
    echo "<strong>Gender:</strong> " . $gender . "<br>";
    echo "<strong>Course:</strong> " . $course . "<br>";

    echo "<strong>Hobbies:</strong> ";

    if(!empty($hobbies)){
        echo implode(", ", $hobbies);
    }
    else{
        echo "No hobbies selected";
    }

    echo "<br>";

    echo "<strong>Message:</strong> " . $message;

    echo "</div>";
}

?>

</div>

</body>
</html>
