<!DOCTYPE html>

<html>

<head>

    <title>Lab 7: Radio Buttons</title>

</head>
<body
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label>

        <input type="radio" name="gender" value="Male" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'Male') echo 'checked'; ?>>

        Male

    </label>

    <label>
        <input type="radio" name="gender" value="Female" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'Female') echo 'checked'; ?>>

        Female
    </label>

    <input type="submit" name="submit" value="Submit">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST ['gender'])) {

        echo "Selected Gender: " . htmlspecialchars($_POST['gender']);

    } else {

        echo "No gender selected.";

    }

}

?>


</body>

</html>
