<?php
include 'config.php';
session_start();
$receiver = $_POST['recipient'];
$message = $_POST['message'];
$sender = $_SESSION['username'];
$sql = "INSERT INTO $receiver (SENDER, MSG) VALUES ('$sender', '$message')";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Message sent successfully'); window.location.href='inbox.php';</script>";
} else {
    echo "<script>alert('No Such User Found'); window.location.href='inbox.php';</script>";
}
?>