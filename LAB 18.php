<?php

$getName = $postName = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['get_submit'])) {
    $getName = htmlspecialchars($_GET['name']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post_submit'])) {
    $postName = htmlspecialchars($_POST['name']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Lab 18: GET vs POST Comparison</title>
</head>
<body>

<h3>Lab 18: GET vs POST Comparison</h3>

<h4>Form using GET method</h4>
<form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name" value="<?php echo $getName; ?>" />
    <input type="submit" name="get_submit" value="Submit GET" />
</form>

<?php
if ($getName !== "") {
    echo "<p><strong>GET form submitted. Name:</strong> " . $getName . "</p>";
    echo "<p>Observe the URL — the parameter <code>?name=" . urlencode($getName) . "&get_submit=Submit+GET</code> appears in the query string.</p>";
}
?>

<hr>

<h4>Form using POST method</h4>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name" value="<?php echo $postName; ?>" />
    <input type="submit" name="post_submit" value="Submit POST" />
</form>

<?php
if ($postName !== "") {
    echo "<p><strong>POST form submitted. Name:</strong> " . $postName . "</p>";
    echo "<p>Observe that the URL does NOT change — the data is sent in the HTTP request body.</p>";
}
?>

</body>
</html>
