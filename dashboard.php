<?php
session_start();
require_once 'connect.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$onlineUserName = $_SESSION['username'];

// Get all online users
$onlineUsers = array();
if(isset($_SESSION['online_users'])) {
    $onlineUsers = $_SESSION['online_users'];
}

if(!in_array($onlineUserName, $onlineUsers)) {
    $onlineUsers[] = $onlineUserName;
    $_SESSION['online_users'] = $onlineUsers;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <div style="max-width: 800px; margin: 20px auto; padding: 20px; background-color: #f4f4f4; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2>Welcome, <?php echo $onlineUserName; ?></h2>
        <h3>Online Users</h3>
        <ul>
            <?php foreach($onlineUsers as $user): ?>
                <li><?php echo $user; ?></li>
            <?php endforeach; ?>
        </ul>
        <h3>User Management</h3>
        <ul>
            <li><a href="add_user.php">Add User</a></li>
            <li><a href="edit_user.php">Edit User</a></li>
            <li><a href="delete_user.php">Delete User</a></li>
        </ul>
        <form action="logout.php" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</body>
</html>
