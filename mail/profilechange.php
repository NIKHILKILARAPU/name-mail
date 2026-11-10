<?php
session_start();
include 'config.php';
if(isset($_POST['change_username'])){
    $new_username = $_POST['new_username'];
    $current_username = $_SESSION['username'];

    if(empty($new_username)){
        echo "<script>alert('Please enter a new username'); window.location.href='profile.php';</script>";
    } else {
        
        $update_query = "UPDATE users SET username='$new_username' WHERE username='$current_username'";
        if(mysqli_query($conn, $update_query)){
           $sql_rename = "RENAME TABLE `$current_username` TO `$new_username`";
           mysqli_query($conn, $sql_rename);
           $_SESSION['username'] = $new_username;
           echo "<script>alert('Username changed successfully'); window.location.href='profile.php';</script>";
           

        } else {
            echo "<script>alert('Error changing username'); window.location.href='profile.php';</script>";
        }
    }
}
if(isset($_POST['change_password'])){
    $current_password=$_POST['current_password'];
    $new_password=$_POST['new_password'];
    $confirm_password=$_POST['confirm_password'];
    $sql="SELECT password FROM users WHERE  username='".$_SESSION['username']."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if($row['password'] !== $current_password){
        echo "<script>alert('Current password is incorrect'); window.location.href='profile.php';</script>";
        exit();;
    }
    if($new_password !== $confirm_password){
        echo "<script>alert('New passwords do not match'); window.location.href='profile.php';</script>";
        exit();;
    }
    else{
        $update_query = "UPDATE users SET password='$new_password' WHERE username='".$_SESSION['username']."'";
        if(mysqli_query($conn, $update_query)){
            echo "<script>alert('Password changed successfully'); window.location.href='profile.php';</script>";
        } else {
            echo "<script>alert('Error changing password'); window.location.href='profile.php';</script>";
        }
    }

}
if(isset($_POST['delete_account'])){
    $username = $_SESSION['username'];
    $delete_query = "DELETE FROM users WHERE username='$username'";
    if(mysqli_query($conn, $delete_query)){
        $sql_drop = "DROP TABLE `$username`";
        mysqli_query($conn, $sql_drop);
        session_destroy();
        echo "<script>alert('Account deleted successfully'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error deleting account'); window.location.href='profile.php';</script>";
    }
}   
?>