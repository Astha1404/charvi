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
    <?php require_once 'navbar.php'; ?>
        <div class="container-fluid p-0">
            <h1 class="text-center p-4 text-light bg-dark">Check Out</h1>
        <?php
            $userId = $_SESSION['userId'];
            $sql = "SELECT * FROM cart WHERE user_id = '{$userId}'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0)
            {
        ?>
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
                                <h5 class="d-inline">Quantity : <?php echo $orderQty; ?></h5>
                            </div>
                        </div>
                    </div>
        </div>
        <?php
                    }
                }
            }
        ?>
            <div class="container text-center my-4">
                <button class="btn btn-success" type="submit" name="orderNow">Order Now</button>
            </div>
        </div>
    <?php require_once 'footer.php'; ?>
</body>
<?php require_once 'scripts.php'; ?>
</html>