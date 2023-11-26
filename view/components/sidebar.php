<div class="sidebar">
    <div class="sidebar-container">
        <h1>Spaces</h1>
        <h3>Welcome, <?php echo $username; ?>!</h3>
        <nav id="sidebar-nav">
            <?php include('../../model/items/get_items.php'); ?>
        </nav>
        <form method="post" action="../../model/items/add_item.php">
            <input type="text" name="itemName" placeholder="Item Name">
            <button type="submit">Add Item</button>
        </form>
        <button id="settings">Settings</button> 
        <button id="end-session" onclick="window.location.href='../../model/auth/logout.php'">Exit Workspace</button>
    </div>
</div>