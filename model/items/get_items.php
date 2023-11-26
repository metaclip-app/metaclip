<?php
require('../../database/database.php');

function loadItems($dbConnection) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM items WHERE user_id = :user_id";
    $stmt = $dbConnection->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $items;
}

$conn = new Connection();
$dbConnection = $conn->getConnection();
if ($dbConnection) {
    $items = loadItems($dbConnection);

    foreach ($items as $item) {
        echo '<div class="item" data-itemid="' . $item['id'] . '">';
        echo $item['name'];
        echo '<button onclick="window.location.href=\'../../model/items/remove_item.php?id=' . $item['id'] . '\'">Delete</button>';
        echo '</div>';
    }
} else {
    echo "Database connection error";
}
?>