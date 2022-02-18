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
    <?php require_once 'navbar.php';
        if(!isset($_SESSION))
        {   
            session_start();
        }
        if(!isset($_SESSION['email']))
        {
            header('Location: /charvi/index.php');
        }
        
        if(isset($_POST['removeCart']))
        {
            $userId = $_SESSION['userId'];
            $productId = $_POST['removeCart'];
            unset($_POST);
            $sql = "DELETE FROM `cart` WHERE user_id = {$userId} AND product_id = {$productId}";
            $result = mysqli_query($con,$sql);
        }

        $userId = $_SESSION['userId'];
        $sql = "SELECT * FROM cart WHERE user_id = '{$userId}'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0)
        {
    ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <?php
            while(($row=mysqli_fetch_assoc($result))!=null)
            {
                $sql = "SELECT * FROM product WHERE product_id={$row['product_id']}";
                $result1 = mysqli_query($con,$sql);
                if(mysqli_num_rows($result1)>0)
                {
                    $row1 =  mysqli_fetch_assoc($result1);
                    $name = $row1['PRODUCT_NAME'];
                    $productId = $row['product_id'];
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
                    $orderQty = $row['quantity'];
    ?>
                    <div class="container-fluid p-0">
                        <h1 class="text-center bg-secondary py-4 text-light">Your Cart</h1>
                        <div class="container">
                            <div class="d-flex bg-light rounded-3 p-4 my-2" id="#temp">
                                <!-- Image -->
                                <img
                                    src="<?php echo $product_images.$img; ?>"
                                    alt="John Doe"
                                    class="me-3 rounded-circle"
                                    style="width: 60px; height: 60px;"
                                />
                                <!-- Body -->
                                <div class="w-100">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="fw-bold" name="productName" id="productId"><?php echo $name; ?></h5>
                                        <button class="btn btn-lg btn-close p-0" type="submit" name="removeCart" value="<?php echo $productId; ?>"></button>
                                    </div>
                                    <h5>Product Quantity :<?php echo $qty; ?>  gm, Company : <?php echo $company; ?>, Category : <?php echo $category; ?></h5>
                                    <h5 class="d-inline">Quantity : </h5><input type="number" name="qty" value="<?php echo $orderQty; ?>" class="form-control w-25 d-inline"/>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php
                }
            }
    ?>
            <div class="container text-center">
                <button class="btn btn-success" type="submit" name="orderNow">Order Now</button>
            </div>
            </form>
    <?php
        }
        else
        {
    ?>
            <div class="container-fluid p-0">
                <h1 class="text-center bg-secondary py-4 text-light">Your Cart is Empty</h1>
            </div>
    <?php
        }
        require_once 'userDashboard.php';
        
        if(isset($_GET['error']))
        {
            $error = $_GET['error'];
            require_once 'error.php';
        }
        if(isset($_GET['success']))
        {
            $error = $_GET['success'];
            require_once 'success.php';
        }
        require_once 'footer.php'; 
    ?>
</body>
<?php require_once 'scripts.php' ?>
</html>