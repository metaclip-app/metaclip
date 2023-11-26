<?php
echo 'item_id: ' . $_GET['item_id'];
require('../../database/database.php');

function loadItems($dbConnection) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM blocks WHERE user_id = :user_id";
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
} else {
    echo "Database connection error";
}

foreach ($items as $item) {
    echo '<div class="item" data-itemid="' . $item['id'] . '">';
    echo $item['name'];
    echo '</div>';
}
?>