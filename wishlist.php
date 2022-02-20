<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
    <?php 
        if(!isset($_SESSION))
        {   
            session_start();
        }
        if(!isset($_SESSION['email']))
        {
            header('Location: /charvi/login.php');
        }
    ?>
    <?php
        require_once 'navbar.php'; 
        if(isset($_POST['removeWishlist']))
        {
            $userId = $_SESSION['userId'];
            $productId = $_POST['removeWishlist'];
            unset($_POST);
            $sql = "DELETE FROM `wishlist` WHERE user_id = {$userId} AND product_id = {$productId}";
            $result = mysqli_query($con,$sql);
        }
        $sql = "SELECT * FROM wishlist WHERE user_id='{$_SESSION['userId']}'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0)
        {
    ?>
            <div class="container-fluid bg-dark">
                <h1 class="text-center text-light py-4">Wishlist</h1>
            </div>
    <?php
            while(($row = mysqli_fetch_assoc($result)))
            {
                $sql = "SELECT * FROM product WHERE product_id={$row['PRODUCT_ID']}";
                $result1 = mysqli_query($con,$sql);
                if(mysqli_num_rows($result1)>0)
                {
    ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <?php
                    $row1 =  mysqli_fetch_assoc($result1);
                    $name = $row1['PRODUCT_NAME'];
                    $productId = $row['PRODUCT_ID'];
                    $qty = $row1['QUANTITY'];
                    $price = $row1['PRICE'];
                    $img = $row1['IMAGE'];
                    $category = $row1['CATEGORY_ID'];
                    $company = $row1['COMPANY_ID'];
                    $sql1 = "SELECT category_name FROM category WHERE category_id = {$category}";
                    $result1 = mysqli_query($con,$sql1);
                    $row1 = mysqli_fetch_assoc($result1);
                    $category = $row1['category_name'];
                    $sql1 = "SELECT company_name FROM company WHERE company_id = {$company}";
                    $result1 = mysqli_query($con,$sql1);
                    $row1 = mysqli_fetch_assoc($result1);
                    $company = $row1['company_name'];
    ?>
                    <div class="container">
                        <div class="d-flex bg-light rounded-3 p-4 my-4" id="#temp">
                            <!-- Image -->
                            <img
                                src="<?php echo $product_images.$img; ?>"
                                class="me-3 rounded-circle"
                                style="width: 60px; height: 60px;"
                            />
                            <!-- Body -->
                            <div class="w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bold" name="productName" id="productId"><a href="http://localhost/charvi/product.php?id=<?php echo $productId; ?>" class="text-decoration-none"><?php echo $name; ?></a></h5>
                                    <button class="btn btn-lg btn-close p-0" type="submit" name="removeWishlist" value="<?php echo $productId; ?>"></button>
                                </div>
                                <h5>Product Quantity :<?php echo $qty; ?>  gm, Category : <?php echo $category; ?></h5>
                                <h5 class="d-block">Company : <?php echo $company; ?></h5>
                                <h5 class="d-block">Price : <?php echo $price; ?></h5>
                            </div>
                        </div>
                    </div>
    <?php
                }
    ?>
            </form>
    <?php
            }
        }
        else
        {
    ?>
        <div class="container-fluid bg-dark">
            <h1 class="text-center text-light py-4">Your Wishlist is Empty</h1>
        </div>
    <?php
        }
    ?>

    <?php 
        require_once 'userDashboard.php';
        if(isset($_GET['success']))
        {
            $success=$_GET['success'];
            require_once 'success.php';
        }
        require_once 'footer.php'; 
    ?>
</body>
<?php require_once 'scripts.php'; ?>
</html>