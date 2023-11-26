<?php include('../../model/auth/check_user.php');?>
<!DOCTYPE html>
<html>
<head>
    <title>Metaclip</title>
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/popup.css">
</head>
<body>
    <?php include('../components/sidebar.php'); ?>
    <div id="canvas">
        <iframe id="blockIframe" src="block.php"></iframe>
    </div>
    <script src="../../public/js/get_block.js"></script>
    <script src="../../public/js/settings.js"></script>
</body>
</html>