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
        require_once 'dbconnection.php';
        if(isset($_POST['confirm']))
        {
            $sql = "SELECT * FROM cart WHERE user_id = {$_SESSION['userId']}";
            $result = mysqli_query($con,$sql);
            $sum = 0;
            if($result)
            {
                while(($row=mysqli_fetch_assoc($result)))
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
                        $sqltemp = "SELECT address_id FROM cart WHERE user_id = {$_SESSION['userId']} AND product_id = {$productId}";
                        $resulttemp = mysqli_query($con,$sqltemp);
                        $rowtemp = mysqli_fetch_assoc($resulttemp);
                        $addressId = $rowtemp['address_id'];
                        $sql = "INSERT INTO `orders`(`ORDER_ID`, `PRODUCT_ID`, `QTY`, `USER_ID`, `STATUS`, `ADDRESS_ID`) VALUES (NULL,'{$productId}','{$orderQty}','{$_SESSION['userId']}','1',{$addressId})";
                        $temp = mysqli_query($con,$sql);
                        if($temp)
                        {
                            $sql = "DELETE FROM cart WHERE product_id = '{$productId}' AND user_id = {$_SESSION['userId']}";
                            $temp = mysqli_query($con,$sql);
                            if($temp)
                            {
                                $success = "Your Order is Successfully Placed";
                                header("Location: /charvi/orders.php?success={$success}");
                            }
                        }
                    }
                }
            }
        }
        require_once 'navbar.php';
        if(isset($_POST['checkOut']))
        {
    ?>
            <div class="container-fluid p-0">
                <h1 class="p-4 text-center bg-dark text-light">Confirm Order</h1>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <?php
            $uid = $_SESSION['userId'];
            $sql = "SELECT * FROM cart WHERE user_id = {$uid}";
            $result = mysqli_query($con,$sql);
            $sum = 0;
            if($result)
            {
                while(($row=mysqli_fetch_assoc($result)))
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
                        $sum += $orderQty*$price;
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
                                    </div>
                                    <h5>Product Quantity :<?php echo $qty; ?>  gm, Company : <?php echo $company; ?>, Category : <?php echo $category; ?></h5>
                                    <h5 class="d-inline">Quantity : <?php echo $orderQty; ?></h5>
                                    <h5 class="d-inline mx-4">Price : <?php echo $orderQty." X ".$price." = ".($orderQty*$price); ?></h5>
                                </div>
                            </div>
                        </div>
    <?php
                    }
                }
            }
    ?>
        <div class="container text-center">
        <div class="container text-center w-50 my-4">
                        <div class="card bg-dark">
                            <h2 class="card-head text-light py-2">Amount Payable</h2>
                            <div class="card-body bg-dark p-0">
                                <table class="table table-responsive table-dark">
                                  <thead>
                                    <tr>
                                      <th scope="col">No.</th>
                                      <th scope="col">Item Name</th>
                                      <th scope="col">Quantity</th>
                                      <th scope="col">Total Price</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                <?php
                                    $userId = $_SESSION['userId'];
                                    $sql = "SELECT * FROM cart WHERE user_id = '{$userId}'";
                                    $result = mysqli_query($con,$sql);
                                    $totalSum = 0;
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        $i = 1;
                                        while(($row=mysqli_fetch_assoc($result))!=null)
                                        {
                                            $sql = "SELECT * FROM product WHERE product_id={$row['product_id']}";
                                            $result1 = mysqli_query($con,$sql);
                                            if(mysqli_num_rows($result1)>0)
                                            {
                                                $row1 =  mysqli_fetch_assoc($result1);
                                                $name = $row1['PRODUCT_NAME'];
                                                $price = $row1['PRICE'];
                                                $orderQty = $row['quantity'];
                                                $price = $orderQty*$price;
                                                $totalSum += $price;
                                                echo "<tr>
                                                <th scope='row'>{$i}</th>
                                                <td>{$name}</td>
                                                <td>{$orderQty}</td>
                                                <td>{$price}</td>
                                              </tr>";
                                              $i++;
                                            }
                                        }
                                    }
                                ?>
                                      
                                      <th colspan="3" scope="row">Sub Total</th>
                                      <td><?php echo $totalSum; ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <h2 class="text-light py-0">Payment : COD</h2>
                                <button type="submit" name="confirm" value ="confirm" class="btn btn-success my-2">Confirm Order</button>
                            </div>
                        </div>
                    </div>
        </div>
    <?php
        }
        else
        {
    ?>
            <div class="container-fluid p-0">
                <h1 class="p-4 text-center bg-dark text-light">Your Order is Successful</h1>
            </div>
            <div class="text-center m-4">
                <a class = "text-center nav-link fs-4" href="orders.php">Go To Orders</a>
            </div>
    <?php
            
        }
    ?>
    
    </form>
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