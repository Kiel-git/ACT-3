<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>

<body>

<h2>Student Registration Form</h2>

<form method="POST" action="LAB19.Process.php">

    Name:
    <input type="text" name="name" required>
    <br><br>

    Email:
    <input type="text" name="email" required>
    <br><br>

    Gender:
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
    <br><br>

    Course:
    <select name="course">

        <option value="BSIT">BSIT</option>
        <option value="BSCS">BSCS</option>
        <option value="BSEDUC">BSEDUC</option>

    </select>

    <br><br>

    Hobbies:
    <input type="checkbox" name="hobbies[]" value="Reading"> Reading
    <input type="checkbox" name="hobbies[]" value="Gaming"> Gaming
    <input type="checkbox" name="hobbies[]" value="Sports"> Sports

    <br><br>

    Message:
    <br>

    <textarea name="message"></textarea>

    <br><br>

    <input type="submit" value="Register">

</form>

</body>
</html>
