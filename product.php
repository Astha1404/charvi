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
        if(isset($_POST['addToCart']))
        {
            $pid = $_POST['addToCart'];
            $userId = $_SESSION['userId'];
            $qty = $_POST['qty'];
            $_GET['id'] = $pid;
            $sql = "SELECT * FROM `cart` WHERE product_id='{$pid}' AND user_id='{$userId}'";
            $result = mysqli_query($con,$sql);
            unset($_POST);
            if(mysqli_num_rows($result)==0)
            {
                $sql1 = "INSERT INTO `cart`(`user_id`, `product_id`, `quantity`) VALUES ('{$userId}','{$pid}','{$qty}')";
                $result = mysqli_query($con,$sql1);
                if($result)
                {
                    $success = "Product is Added To Your Cart Successfully";
                    header("Location: /charvi/product.php?id={$pid} & success={$success}");
                }
                else
                {
                    $error = "Can't Add This Product To Your Cart Right Now";
                    header("Location: /charvi/product.php?id={$pid} & error={$error}");
                }
            }
            else
            {
                $error = "The Product is Already in Your Cart";
                header("Location: /charvi/product.php?id={$pid} & error={$error}");
            }
        }
    ?>
    <div class="container-fluid p-0 mb-4 mx-0 pb-4 row">
        <?php require_once 'product_content.php'; ?>
    </div>
    <?php
        require_once 'other-menulist.php';
        require_once 'userDashboard.php';
        if(isset($_GET['success']))
        {
            $success=$_GET['success'];
            require_once 'success.php';
        }
        if(isset($_GET['error']))
        {
            $error=$_GET['error'];
            require_once 'error.php';
        }
        require_once 'footer.php';
    ?>
</body>
    <?php require_once 'scripts.php'; ?>
</html>