<?php
$servername = "localhost";
$username = "sumit"; 
$password = "sumit@53"; 
$dbname = "voter_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullName = $_POST['fullName'];
$email = $_POST['email'];
$age = $_POST['age'];

$sql = "INSERT INTO voters (full_name, email, age) VALUES ('$fullName', '$email', $age)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
