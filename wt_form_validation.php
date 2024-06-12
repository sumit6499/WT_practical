<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Cache-Control" content="post-check=0, pre-check=0" false>
    <meta http-equiv="Pragma" content="no-cache">
    <title>Simple PHP Form Validation</title>
</head>
<body>
    <h2>PHP Form Validation Example</h2>

    <?php
    // Initialize variables
    $name = $email = $gender = "";
    $nameErr = $emailErr = $genderErr = "";

    // Function to sanitize input data
    function test_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }

        // Validate email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // Validate gender
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        // Display the results if no errors
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
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name">
        <span class="error"><?php echo $nameErr;?></span>
        <br><br>
        E-mail: <input type="text" name="email">
        <span class="error"><?php echo $emailErr;?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <span class="error"><?php echo $genderErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
