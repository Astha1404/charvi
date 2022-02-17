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
        require_once 'carousel.php';
        require_once 'chikki-menulist.php';
        require_once 'kacharyu-menulist.php';
        require_once 'item-menu.php';
        require_once 'userDashboard.php';
        require_once 'footer.php';

        if(isset($_GET['success']))
        {
            $success=$_GET['success'];
            require_once 'success.php';
        }
    ?>
</body>
    <?php require_once 'scripts.php' ?>
</html>