<?php
if (isset($_POST["course"])) {
    $course = $_POST["course"];
    echo "Selected Course: " . $course;
}
?>

<form method="post" action="">
    <select name="course">
        <option value="BSIT">BSIT</option>
        <option value="BSCS">BSCS</option>
        <option value="BSBA">BSBA</option>
        <option value="BSED">BSED</option>
    </select><br><br>
    <input type="submit" value="Submit">
</form>
