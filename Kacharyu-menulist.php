<div class="container-fluid my-5 mx-0 px-2">
    <h1 class="display-6 text-secondary text-center mb-4"><span class="border-bottom border-5 mb-4">Kacharyu</span></h1>
    <div class="menulist-carousel owl-carousel owl-theme">
        <?php 
            $sql = "SELECT `PRODUCT_ID`, `PRODUCT_NAME`, `PRICE`, `DESCRIPTION`, `QUANTITY`, `IMAGE` FROM product WHERE `CATEGORY_ID` = (SELECT CATEGORY_ID FROM category WHERE category_name = 'KACHRIYU') LIMIT 5";
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
                                <a href='{$id}' class='btn btn-primary'>Buy Now <i class='fas fa-shopping-cart'></i></a>
                                </div>
                            </div>
                        </div>";
                }
            }
        ?>
        
    </div>
</div>