<?php
include 'config.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$conform_password = $_POST['confirm_password'];
if($password !== $conform_password){
    echo "<script>alert('Passwords do not match'); window.location.href='index.html';</script>";
    exit();
}
if(isset($_POST['remember_me'])){
    setcookie('username', $username, time() + (86400 * 30), "/");
    setcookie('password', $password, time() + (86400 * 30), "/");
}
$sql="CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        $sql="CREATE TABLE IF NOT EXISTS $username(ID INT(11) AUTO_INCREMENT PRIMARY KEY,SENDER VARCHAR(255) NOT NULL, MSG VARCHAR(255) NOT NULL)";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            echo "<script>alert('User created successfully'); window.location.href='inbox.php';</script>";
        } else {
            echo "user already exists" ;
        }
    } else {
        echo "Error creating user: " ;
    }
}
else {
    echo "Error creating users";
}mysqli_close($conn);

?>