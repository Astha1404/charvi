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
        if(!isset($_SESSION))
        {
            session_start();
        }
        require_once 'dbconnection.php';
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
        require_once 'navbar.php';
    ?>
    <div class="container-fluid p-0 mb-4 mx-0 pb-4 row">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row p-0 m-0">

<?php 
    if(!isset($_SESSION))
    {   
        session_start();
    }
    if(!isset($_GET['id']))
    {
        echo "<h1 class='text-center text-dark my-5 py-5'>404 - Page NOT Found</h1>";
        die();
    }
    if(isset($_GET['like']) && isset($_SESSION['email']))
    {
            $sql = "SELECT * FROM wishlist WHERE user_id={$_SESSION['userId']} AND product_id={$_GET['id']}";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)==0)
            {
                $sql = "INSERT INTO `wishlist`(`USER_ID`, `PRODUCT_ID`) VALUES ('{$_SESSION['userId']}','{$_GET['id']}')";
                $result = mysqli_query($con,$sql);
                echo "<script>window.location.href='product.php?id={$_GET['id']}';</script>";
            }
            else
            {
                $sql = "DELETE FROM `wishlist` WHERE user_id={$_SESSION['userId']} AND product_id={$_GET['id']}";
                $result = mysqli_query($con,$sql);
                echo "<script>window.location.href='product.php?id={$_GET['id']}';</script>";
                
            }
    }
    if(isset($_GET['like']) && !isset($_SESSION['email']))
    {
        header("Location: /charvi/login.php");
    }
    $sql = "SELECT * FROM product WHERE product_id = {$_GET['id']}";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)!=1)
    {
        echo "<h1 class='text-center text-dark my-5 py-5'>404 - Page NOT Found</h1>";
        die();
    }
    else
    {
        $row = mysqli_fetch_assoc($result);
        $img = $row['IMAGE'];
        $name = $row['PRODUCT_NAME'];
        $price = $row['PRICE'];
        $qty = $row["QUANTITY"];
        $desc = $row["DESCRIPTION"];
        $id = $row['PRODUCT_ID'];
        $category = $row['CATEGORY_ID'];
        $company = $row['COMPANY_ID'];
        $sql = "SELECT category_name FROM category WHERE category_id = {$category}";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        $category = $row['category_name'];
        $sql = "SELECT company_name FROM company WHERE company_id = {$company}";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        $company = $row['company_name'];
        if(isset($_SESSION['email']))
        {
            $sql = "SELECT * FROM wishlist WHERE user_id = {$_SESSION['userId']} AND product_id={$id}";
            $result = mysqli_query($con,$sql);
            $like = mysqli_num_rows($result)==1?true:false;
        }
        else
        {
            $like = false;
        }

        echo "<div class='col-md-6 col-sm-12 col-12 mx-auto bg-primary overflow-hidden m-0 p-0'>
                <div class='position-relative'>
                    <img src='{$product_images}{$img}' class='img-fluid w-100'>";
                    if($like)
                    {
                        echo "<a href='{$_SERVER['PHP_SELF']}?id={$id} & like=1' class='position-absolute end-0 top-0 px-4 py-1 bg-light'><span><i class='bi bi-heart-fill text-danger fs-2'></i></span></a>";
                    }
                    else
                    {
                        echo "<a href='{$_SERVER['PHP_SELF']}?id={$id} & like=0' class='position-absolute end-0 top-0 px-4 py-1 bg-light'><span><i class='bi bi-heart text-danger fs-2'></i></span></a>";
                    }
                    
                echo" </div>
                <div class='row'>
                    <button type='submit' name='addToCart' value='{$id}' class='btn btn-primary col-12 p-3 fs-5'>Add To Cart <i class='bi bi-basket'></i></button>
                </div>
            </div>
            <div class='col-md-6 col-sm-12 col-12 mx-auto overflow-hidden m-0 p-0 row my-sm-2 my-md-0'>
                <div class='container-fluid m-0 p-0 col-6 col-md-12'>
                    <h2 class='text-light bg-dark p-4'>{$name}</h2>
                    <h3 class='text-dark m-4'>Price : {$price} Rs / Pkt</h3>
                    <h3 class='text-dark m-4'>Quantity : {$qty} gm</h3>
                    <h4 class='text-dark m-4'>Category : {$category}</h4>
                    <h4 class='text-dark m-4'>Brand : {$company}</h4>
                    <div class='d-flex align-items-center'>
                        <h4 class='d-inline text-dark mx-4'>Product Quantity : </h4><input type='number'  value='1' name='qty' class='form-control w-25 d-inline' required/>
                    </div>
                </div>
                <div class='container-fluid mx-auto m-0 p-0 col-6 col-md-12'>
                    <h2 class='text-center bg-secondary text-light py-4 p-0'>Description</h2>
                    <p class='m-4 text-center fs-5'>{$desc}</p>
                </div>
            </div>";
    ?>
    </form>
    <?php } ?>
    </div>
    <?php
        require_once 'feedback.php';
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