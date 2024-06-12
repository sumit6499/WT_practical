<?php
$name = $email = $gender = "";
$nameErr = $emailErr = $genderErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (!$nameErr && !$emailErr && !$genderErr) {
        echo "<h2>Your Input:</h2>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Gender: $gender<br>";
    } else {
        echo "<h2>Errors:</h2>";
        echo $nameErr . "<br>";
        echo $emailErr . "<br>";
        echo $genderErr . "<br>";
    }
}

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>
