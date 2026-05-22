<?php
$selectedHobbies = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['hobbies'])) {
        // Sanitize each selected hobby
        foreach ($_POST['hobbies'] as $hobby) {
            $selectedHobbies[] = htmlspecialchars($hobby);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 14: Checkbox Input</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Select your hobbies:</label><br>
        <input type="checkbox" name="hobbies[]" value="Reading" 
            <?php if (in_array("Reading", $selectedHobbies)) echo "checked"; ?>> Reading<br>
        <input type="checkbox" name="hobbies[]" value="Traveling" 
            <?php if (in_array("Traveling", $selectedHobbies)) echo "checked"; ?>> Traveling<br>
        <input type="checkbox" name="hobbies[]" value="Cooking" 
            <?php if (in_array("Cooking", $selectedHobbies)) echo "checked"; ?>> Cooking<br>
        <input type="checkbox" name="hobbies[]" value="Sports" 
            <?php if (in_array("Sports", $selectedHobbies)) echo "checked"; ?>> Sports<br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if (!empty($selectedHobbies)) {
        echo "<h3>You selected these hobbies:</h3>";
        echo "<ul>";
        foreach ($selectedHobbies as $hobby) {
            echo "<li>$hobby</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
