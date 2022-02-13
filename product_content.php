<?php 
    if(!isset($_GET['id']))
    {
        echo "<h1 class='text-center text-dark my-5 py-5'>404 - Page NOT Found</h1>";
        die();
    }
    $sql = "SELECT * FROM product WHERE product_id = {$_GET['id']}";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)!=1)
    {
        echo "<h1 class='text-center text-light my-5 py-5'>404 - Page NOT Found</h1>";
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

        echo "<div class='col-md-6 col-sm-12 col-12 mx-auto bg-primary overflow-hidden m-0 p-0'>
                <img src='{$product_images}{$img}' class='img-fluid w-100'>
                <div class='row'>
                    <a href= '{$id}' class='btn btn-success col-6 p-3 fs-5'>Buy Now <i class='fas fa-shopping-cart'></i></a>
                    <a href='{$id}' class='btn btn-primary col-6 p-3 fs-5'>Add To Cart <i class='bi bi-basket'></i></a>
                </div>
            </div>
            <div class='col-md-6 col-sm-12 col-12 mx-auto overflow-hidden m-0 p-0 row my-sm-2 my-md-0'>
                <div class='container-fluid m-0 p-0 col-6 col-md-12'>
                    <h2 class='text-light bg-dark p-4'>{$name}</h2>
                    <h3 class='text-dark m-4'>Price : {$price} Rs / Pkt</h3>
                    <h3 class='text-dark m-4'>Quantity : {$qty} gm</h3>
                    <h4 class='text-dark m-4'>Category : {$category}</h4>
                    <h4 class='text-dark m-4'>Brand : {$company}</h4>
                </div>
                <div class='container-fluid mx-auto m-0 p-0 col-6 col-md-12'>
                    <h2 class='text-center bg-secondary text-light py-4 p-0'>Description</h2>
                    <p class='m-4 text-center fs-5'>{$desc}</p>
                </div>
            </div>";
    ?>

<?php } ?>