<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!isset($_SESSION['username'])){
    echo "<script>alert('Please login first'); window.location.href='index.html';</script>";
    exit();
}

include 'config.php';
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="profile.css">
    </head>
    <body>
            <header class="inbox-header">
        <div class="left">
            <img src="logo.png" alt="Logo" class="logo">
            <span class="title">Name Mail</span>
        </div>

        <div class="right">
            <a href="inbox.php" class="btn inbox">Inbox</a>
            <a href="createmsg.html" class="btn create">Create Message</a>
            <a href="profile.html" class="btn profile">My Profile</a>
            <a href="logout.php" class="btn logout">Logout</a>
        </div>
    </header>
    <div class="welcome">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?></h2>
    </div>

    <div class="profile-container">
    <form action="profilechange.php" method="POST">
        
    <div class="profile-card">
        <h2>Account Settings</h2>

        <!-- Change Username -->
        <div class="section">
            <h3>Change Username</h3>
            <input type="text" placeholder="Enter new username" id="new-username" name="new_username">
            <button class="btn primary" type="submit" name="change_username">Change Username</button>
        </div>

        <!-- Change Password -->
        <div class="section">
            <h3>Change Password</h3>
            <input type="password" placeholder="Current password" id="current-password" name="current_password">
            <input type="password" placeholder="New password" id="new-password" name="new_password">
            <input type="password" placeholder="Confirm new password" id="confirm-password" name="confirm_password">
            <button class="btn success" type="submit" name="change_password">Change Password</button>
        </div>

        <!-- Delete Account -->
        <div class="section danger-zone">
            <h3>Danger Zone</h3>
            <button class="btn danger" type="submit" name="delete_account">Delete Account</button>
        </div>

    </div>
    </form>

</div>


    

    </body>
</html>