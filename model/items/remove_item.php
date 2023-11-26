<?php
require('../../database/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if the 'id' parameter is present in the GET request
    if(isset($_GET['id'])) {
        // Get the item ID from the GET request
        $id = $_GET['id'];

        // Create a new database connection
        $conn = new Connection();
        $dbConnection = $conn->getConnection();

        // Start a transaction to ensure both deletes succeed or fail together
        $dbConnection->beginTransaction();

        try {
            // First, delete blocks associated with the item
            $sqlDeleteBlocks = "DELETE FROM blocks WHERE item_id = :item_id";
            $stmtDeleteBlocks = $dbConnection->prepare($sqlDeleteBlocks);
            $stmtDeleteBlocks->bindParam(':item_id', $id, PDO::PARAM_INT);
            $stmtDeleteBlocks->execute();

            // Then, delete the item itself
            $sqlDeleteItem = "DELETE FROM items WHERE id = :id";
            $stmtDeleteItem = $dbConnection->prepare($sqlDeleteItem);
            $stmtDeleteItem->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtDeleteItem->execute();

            // Commit the transaction if all queries are successful
            $dbConnection->commit();
            echo "Item and associated blocks removed successfully!";
        } catch (Exception $e) {
            // An error occurred, rollback the transaction
            $dbConnection->rollBack();
            echo "Error: Unable to remove item and associated blocks.";
        }
    } else {
        // 'id' parameter not present in the request
        echo "Error: Item ID not provided.";
    }
} else {
    // Invalid request method
    echo "Invalid request.";
}
?>