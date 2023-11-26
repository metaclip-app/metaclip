<?php
require('../../database/database.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['itemId']) && isset($_POST['blockName'])) {
        $itemId = filter_var($_POST['itemId'], FILTER_SANITIZE_NUMBER_INT);
        $blockName = filter_var($_POST['blockName'], FILTER_SANITIZE_STRING);

        $conn = new Connection();
        $dbConnection = $conn->getConnection();

        $sql = "INSERT INTO blocks (item_id, link) VALUES (:itemId, :blockName)";
        $stmt = $dbConnection->prepare($sql);

        if ($stmt) {
            $stmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
            $stmt->bindParam(':blockName', $blockName, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "error: " . implode(" - ", $stmt->errorInfo());
            }
        } else {
            echo "error: " . implode(" - ", $dbConnection->errorInfo());
        }
        $conn = null; // Close the database connection
    } else {
        echo "error: Invalid input data.";
    }
} else {
    echo "Invalid request method.";
}
?>