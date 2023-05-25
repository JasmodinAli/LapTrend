<?php
$email = $_POST['email'];
$password = $_POST['password'];
$cnfpassword = $_POST['cnfpassword'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test4');

// Check connection
if ($conn->connect_error) {
    die('Connection Failed' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO signup (email, password, cnfpassword) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $password, $cnfpassword);
    $stmt->execute();
    echo "Registration successful";
    $conn->close();
    $stmt->close();
}
?>
