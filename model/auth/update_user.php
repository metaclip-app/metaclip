<?php
require(dirname(__DIR__) . '../../database/database.php');
include('check_user.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function updateUserInfo($conn, $userId, $newUsername, $newEmail, $newPassword) {
        // Check if each field is provided and update only those that are provided
        $updateSql = "UPDATE users SET";
        $params = [];

        if (!empty($newUsername)) {
            $updateSql .= " username = ?,";
            $params[] = $newUsername;
        }

        if (!empty($newEmail)) {
            $updateSql .= " email = ?,";
            $params[] = $newEmail;
        }

        if (!empty($newPassword)) {
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateSql .= " password = ?,";
            $params[] = $hash;
        }

        // Remove the trailing comma and add the WHERE clause
        $updateSql = rtrim($updateSql, ',') . " WHERE id = ?";
        $params[] = $userId;

        $stmt = $conn->prepare($updateSql);
        $stmt->execute($params); // Pass the parameters directly to execute

        return $stmt->rowCount() > 0; // Check if any rows were affected
    }

    $databaseConnection = new Connection();
    $conn = $databaseConnection->getConnection();

    $userId = $_SESSION['user_id'];
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];
    $newPassword = $_POST['newPassword'];

    $result = updateUserInfo($conn, $userId, $newUsername, $newEmail, $newPassword);

    if ($result) {
        // Update session values if the database update is successful
        $_SESSION['username'] = $newUsername;
        $_SESSION['email'] = $newEmail;

        echo "User information updated successfully!";
    } else {
        echo "Error updating user information.";
    }
} else {
    echo "Invalid request method.";
}
?>