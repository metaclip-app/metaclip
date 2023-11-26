<!DOCTYPE html>
<html>
<head>
    <title>Task Page</title>
    <style>
        * {
            color: white;
        }

        body {
            background: #161616;
        }
    </style>
</head>
<body>
    <h2>Task Page</h2>
    <?php
    require(dirname(__DIR__) . '../../database/database.php');
    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        if (isset($_GET['item_id'])) {
            $item_id = filter_var($_GET['item_id'], FILTER_SANITIZE_NUMBER_INT);
            ?>
            <form id="addBlockForm" method="post" action="../../model/blocks/add_block.php">
                <input type="hidden" id="itemId" name="itemId" value="<?php echo $item_id; ?>">
                <input type="text" name="blockName" placeholder="Link">
                <button type="submit">Add Block</button>
            </form>

            <div id="blockList">
                <?php
                $conn = new Connection();
                $dbConnection = $conn->getConnection();

                $sql = "SELECT * FROM blocks WHERE item_id = :item_id";
                $stmt = $dbConnection->prepare($sql);
                $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
                $stmt->execute();

                $blocks = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($blocks) > 0) {
                    foreach ($blocks as $block) {
                        echo '<div>' . $block['link'] . '<form class="removeBlockForm" method="post" action="../../model/blocks/remove_block.php">';
                        echo '<input type="hidden" name="blockId" value="' . $block['id'] . '">';
                        echo '<button type="submit" class="removeTaskButton">Delete</button>';
                        echo '</form></div>';
                    }
                } else {
                    echo "No tasks found for this list.";
                }
                ?>
            </div>
            <?php
        } else {
            echo "Please select a list to view tasks.";
        }
    }
    ?>
</body>
</html>