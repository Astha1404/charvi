<div class="container w-75 my-4 h-100 nav-justified item-menu" style="margin-bottom: 200px !important;">
    <ul class="nav nav-tabs">
        <li class="nav-item tab-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#laddu">Laddu</a>
        </li>
        <li class="nav-item tab-item">
            <a class="nav-link" data-bs-toggle="tab" href="#snacks">Snacks</a>
        </li>
        <li class="nav-item tab-item">
            <a class="nav-link" data-bs-toggle="tab" href="#papad">Papad</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
    <div class="tab-pane container active" id="laddu">
        <div class="d-flex flex-wrap justify-content-center">
            <?php
                require 'dbconnection.php';
                $sql = "SELECT `PRODUCT_ID`, `PRODUCT_NAME`, `PRICE`, `DESCRIPTION`, `QUANTITY`, `IMAGE` FROM product WHERE `CATEGORY_ID` = (SELECT CATEGORY_ID FROM category WHERE category_name = 'LADDU') LIMIT 9";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    while(($row=mysqli_fetch_assoc($result))!=null)
                    {
                        $img = $row['IMAGE'];
                        $name = $row['PRODUCT_NAME'];
                        $price = $row['PRICE'];
                        $qty = $row["QUANTITY"];
                        $id = $row['PRODUCT_ID'];
                        echo "<div class='card m-3' style='width:16rem;'>
                                <img src='{$product_images}{$img}' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$name}</h5>
                                    <p class='card-text mb-0'>Price : {$price} Rs / Pkt</p>
                                    <p class='card-text mt-0'>Quantity : {$qty} gm</p>
                                    <div class='row container-fluid p-0 mx-auto'>
                                        <a href='{$id}' class='btn btn-success col-12 col-md-6 text-nowrap mx-md-1 my-md-0 my-sm-2 mx-sm-0 my-2'>Buy Now <i class='fas fa-shopping-cart'></i></a>
                                        <a href='{$product_page}?id={$id}' class='btn btn-primary col-12 col-md-5 text-nowrap mx-md-1 my-md-0 my-sm-2 mx-sm-0 my-2'>View <i class='bi bi-eye'></i></a>
                                    </div>
                                </div>
                            </div>";

                    }
                }
                else
                {
                    echo "error";
                }    
            ?>
        </div>
    </div>
    <div class="tab-pane container fade" id="snacks">
        <div class="d-flex flex-wrap justify-content-center">
            <?php
                require 'dbconnection.php';
                $sql = "SELECT `PRODUCT_ID`, `PRODUCT_NAME`, `PRICE`, `DESCRIPTION`, `QUANTITY`, `IMAGE` FROM product WHERE `CATEGORY_ID` = (SELECT CATEGORY_ID FROM category WHERE category_name = 'SNACKS') LIMIT 9";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    while(($row=mysqli_fetch_assoc($result))!=null)
                    {
                        $img = $row['IMAGE'];
                        $name = $row['PRODUCT_NAME'];
                        $price = $row['PRICE'];
                        $qty = $row["QUANTITY"];
                        $id = $row['PRODUCT_ID'];
                        echo "<div class='card m-3' style='width:16rem;'>
                                <img src='{$product_images}{$img}' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$name}</h5>
                                    <p class='card-text mb-0'>Price : {$price} Rs / Pkt</p>
                                    <p class='card-text mt-0'>Quantity : {$qty} gm</p>
                                    <div class='row container-fluid p-0 mx-auto'>
                                        <a href='{$id}' class='btn btn-success col-12 col-md-6 text-nowrap mx-md-1 my-md-0 my-sm-2 mx-sm-0 my-2'>Buy Now <i class='fas fa-shopping-cart'></i></a>
                                        <a href='{$product_page}?id={$id}' class='btn btn-primary col-12 col-md-5 text-nowrap mx-md-1 my-md-0 my-sm-2 mx-sm-0 my-2'>View <i class='bi bi-eye'></i></a>
                                    </div>
                                </div>
                            </div>";

                    }
                }
                else
                {
                    echo "error";
                }    
            ?>
        </div>
    </div>
    <div class="tab-pane container fade" id="papad">
        <div class="d-flex flex-wrap justify-content-center">
            <?php
                require 'dbconnection.php';
                $sql = "SELECT `PRODUCT_ID`, `PRODUCT_NAME`, `PRICE`, `DESCRIPTION`, `QUANTITY`, `IMAGE` FROM product WHERE `CATEGORY_ID` = (SELECT CATEGORY_ID FROM category WHERE category_name = 'PAPAD') LIMIT 9";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    while(($row=mysqli_fetch_assoc($result))!=null)
                    {
                        $img = $row['IMAGE'];
                        $name = $row['PRODUCT_NAME'];
                        $price = $row['PRICE'];
                        $qty = $row["QUANTITY"];
                        $id = $row['PRODUCT_ID'];
                        echo "<div class='card m-3' style='width:16rem;'>
                                <img src='{$product_images}{$img}' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$name}</h5>
                                    <p class='card-text mb-0'>Price : {$price} Rs / Pkt</p>
                                    <p class='card-text mt-0'>Quantity : {$qty} gm</p>
                                    <div class='row container-fluid p-0 mx-auto'>
                                        <a href='{$id}' class='btn btn-success col-12 col-md-6 text-nowrap mx-md-1 my-md-0 my-sm-2 mx-sm-0 my-2'>Buy Now <i class='fas fa-shopping-cart'></i></a>
                                        <a href='{$product_page}?id={$id}' class='btn btn-primary col-12 col-md-5 text-nowrap mx-md-1 my-md-0 my-sm-2 mx-sm-0 my-2'>View <i class='bi bi-eye'></i></a>
                                    </div>
                                </div>
                            </div>";

                    }
                }
                else
                {
                    echo "error";
                }    
            ?>
        </div>
    </div>
    </div>
</div>