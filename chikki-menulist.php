<div class="container-fluid my-5 mx-0 px-2">
    <h1 class="display-6 text-secondary text-center mb-4"><span class="border-bottom border-5 mb-4" style="border:rgb(230, 198, 157) ;">Chikki</span></h1>
    <div class="menulist-carousel owl-carousel mx-4 owl-theme">
        
    <?php
        require 'dbconnection.php';
        $sql = "SELECT `PRODUCT_ID`, `PRODUCT_NAME`, `PRICE`, `DESCRIPTION`, `QUANTITY`, `IMAGE` FROM product WHERE `CATEGORY_ID` = (SELECT CATEGORY_ID FROM category WHERE category_name = 'CHIKKI') LIMIT 5";
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
                echo "<div class='item'>
                        <div class='card m-4' style='width:16rem;'>
                            <img src='{$product_images}{$img}' class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$name}</h5>
                                <p class='card-text mb-0'>Price : {$price} Rs / Pkt</p>
                                <p class='card-text mt-0'>Quantity : {$qty} gm</p>
                                <div class='row container-fluid p-0 mx-auto'>
                                    <a href='{$product_page}?id={$id}' class='btn btn-primary col-12 text-nowrap mx-md-1 my-md-0 my-sm-2 mx-sm-0 my-2'>View <i class='bi bi-eye'></i></a>
                                </div>
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
        <div class='item'>
            <div class='card m-4 d-flex align-items-center justify-content-center overflow-hidden' style='width:16rem; height:26.4rem;'>
                <?php 
                    $sql = "SELECT category_id FROM category WHERE category_name = 'CHIKKI'";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $cid = $row['category_id'];
                ?>
                <a href="<?php echo "{$category_page}?cid={$cid}"; ?>" class="stretched-link"><img src='Assets/Images/viewmore.jpeg' class='card-img' style="transform:scale(1.2);"></a>
            </div>
        </div>
    </div>
    
</div>