<?php include('../../model/auth/check_user.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/settings.css">
    <title>Settings</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-container">
            <span class="popup-close" onclick="closePopup()">Close</span>
            <h1>Settings</h1>
            <nav id="sidebar-nav">
                <button class="item">Account</button>
                <button class="item">Themes [coming soon]</button>
                <button class="item">About</button>
            </nav>
        </div>
    </div>
    <div class="settings-content">
        <h3>Welcome, <?php echo $username; ?></h3>
        <h5>User ID: <?php echo $user_id; ?></h5>
        <form action="../../model/auth/update_user.php" method="POST">
            <div class="form-group">
                <label for="newUsername">Update username:</label>
                <input type="text" id="newUsername" name="newUsername">
            </div>
            <div class="form-group">
                <label for="newEmail">Update email:</label>
                <input type="email" id="newEmail" name="newEmail">
            </div>
            <div class="form-group">
                <label for="newPassword">Update password:</label>
                <input type="password" id="newPassword" name="newPassword">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
    <script>
        function closePopup() {
            var overlay = parent.document.querySelector('.popup-overlay');
            parent.document.body.removeChild(overlay);
        }
    </script>
</body>
</html>