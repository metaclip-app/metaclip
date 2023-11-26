<?php
require(dirname(__DIR__) . '../../database/database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['blockId'])) {
    $blockId = filter_var($_POST['blockId'], FILTER_SANITIZE_NUMBER_INT);

    $conn = new Connection();
    $dbConnection = $conn->getConnection();

    $sql = "DELETE FROM blocks WHERE id = :blockId";
    $stmt = $dbConnection->prepare($sql);
    $stmt->bindParam(':blockId', $blockId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Task removed successfully
        echo "Task removed successfully!";
    } else {
        // Error while removing the task
        echo "Error: Unable to remove the task.";
    }
} else {
    // Invalid request
    echo "Invalid request.";
}
?>