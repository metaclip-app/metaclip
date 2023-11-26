<?php
require('../../database/database.php');

// Start the session
session_start();

if (isset($_SESSION['user_id']) && isset($_POST['itemName'])) {
    // Retrieve user ID from the session
    $user_id = $_SESSION['user_id'];

    // Sanitize the list name
    $item_name = filter_var($_POST['itemName'], FILTER_SANITIZE_STRING);

    $conn = new Connection(); // Create a new database connection
    $dbConnection = $conn->getConnection();

    // Use PDO prepared statements to insert the new list
    $sql = "INSERT INTO items (user_id, name) VALUES (:user_id, :item_name)";
    $stmt = $dbConnection->prepare($sql);

    if ($stmt) {
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':item_name', $item_name, PDO::PARAM_STR);
        
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
?>