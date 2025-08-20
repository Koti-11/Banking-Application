<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['account_number'] = $user['account_number'];
        $_SESSION['ifsc_code'] = $user['ifsc_code'];

        header("Location: dashboard.php");
        exit();
    } else {
        echo "❌ Invalid Password";
    }
} else {
    echo "❌ No account found with this email";
}

$conn->close();
?>
