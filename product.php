<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once 'header.php' ?>
</head>
<body>
    <?php
        require_once 'navbar.php';
    ?>
    <div class="container-fluid p-0 mb-4 mx-0 pb-4 row">
        <?php require_once 'product_content.php'; ?>
    </div>
    <?php
        require_once 'other-menulist.php';
        require_once 'userProfileMenu.php';
        require_once 'footer.php';
    ?>
</body>
    <?php require_once 'scripts.php'; ?>
</html>