<?php
include 'config.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   echo "<script>alert('Login successful'); window.location.href='inbox.php';</script>";
    $_SESSION['username'] = $username;
} else {
    echo "<script>alert('Invalid username or password'); window.location.href='index.html';</script>";   
}
?>