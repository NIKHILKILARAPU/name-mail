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
    <link rel="stylesheet" href="inbox.css">
</head>

<body>
<div>

    <header class="inbox-header">
        <div class="left">
            <img src="logo.png" alt="Logo" class="logo">
            <span class="title">Name Mail</span>
        </div>

        <div class="right">
            <a href="inbox.php" class="btn inbox">Inbox</a>
            <a href="createmsg.html" class="btn create">Create Message</a>
            <a href="profile.php" class="btn profile">My Profile</a>
            <a href="logout.php" class="btn logout">Logout</a>
        </div>
    </header>

    <div class="welcome">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?></h2>
    </div>

    <div class="inbox-container">
<?php
$sql = "SELECT * FROM `$username` ORDER BY ID DESC";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    echo "<table class='inbox-table'>
            <tr>
                <th>From</th>
                <th>Message</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>".htmlspecialchars($row['SENDER'])."</td>
                <td>".htmlspecialchars($row['MSG'])."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p class='no-msg'>No messages in your inbox.</p>";
}
?>
</div>


</div>
</body>
</html>
