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
        if(!isset($_GET['cid']))
        {
            echo "<h1 class='text-center text-dark my-5 py-5'>404 - Page NOT Found</h1>";
            die();
        }
        $category = $_GET['cid'];
        $sql = "SELECT category_name FROM category WHERE category_id = {$category}";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)!=1)
        {
            echo "<h1 class='text-center py-4 my-4'>404 Page Not Found</h1>";
            die();
        }
        else
        {
            $row = mysqli_fetch_assoc($result);
            $category = $row['category_name'];
    ?>
    <div class="offcanvas offcanvas-start" id="categoryOffcanvas">
        <div class="offcanvas-header bg-secondary">
            <h1 class="offcanvas-title text-center text-light w-100 m-0 p-0">Categories</h1>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class='list-group categoryOffcanvasList'>
            <?php
                  $sql = "SELECT * FROM category";
                  $result = mysqli_query($con,$sql);
                  if(mysqli_num_rows($result)>0)
                  {
                      while(($row = mysqli_fetch_assoc($result))!=null)
                      {
                          echo "<a class='list-group-item list-group-active text-center' href={$category_page}?cid={$row['CATEGORY_ID']}>{$row['CATEGORY_NAME']}</a>";
                      }
                  }
            ?>
        </div>
    </div>
    <div class="container-fluid category-header navbar-toggler navbar-light d-flex py-4 flex-row">
        <a href='#categoryOffcanvas' class= 'text-dark col-1 my-auto text-center' data-bs-toggle='offcanvas' role='button'><span class="navbar-toggler-icon text-dark"></span></a>
        <h2 class="text-center col-10 my-auto">Browse Products</h2>
    </div>
    <div class="container-fluid px-0">
        <h1 class="text-center categoryName text-light p-4"><?php echo $category ?></h1>
        <div class="d-flex py-4 flex-wrap justify-content-center container-fluid categoryDisplayArea">
            <?php
                $sql = "SELECT `PRODUCT_ID`, `PRODUCT_NAME`, `PRICE`, `DESCRIPTION`, `QUANTITY`, `IMAGE` FROM product WHERE `CATEGORY_ID` = (SELECT CATEGORY_ID FROM category WHERE category_name = '{$category}')";
                $result = mysqli_query($con,$sql);
                $numberOfRecords = mysqli_num_rows($result);
                $limit = 6;
                if(isset($_GET['page']))
                {
                    $offset = ($_GET['page']-1)*$limit;
                }
                else
                {
                $offset = 0;
                }
                $sql = "SELECT `PRODUCT_ID`, `PRODUCT_NAME`, `PRICE`, `DESCRIPTION`, `QUANTITY`, `IMAGE` FROM product WHERE `CATEGORY_ID` = (SELECT CATEGORY_ID FROM category WHERE category_name = '{$category}') LIMIT {$offset}, {$limit}";
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
    <div class="container">
        <?php echo
            "<nav aria-label='Page navigation example'>
                <ul class='pagination justify-content-center pagination-lg'>";
                    $pageNumber = isset($_GET['page'])?$_GET['page']:1;
                    if($pageNumber!=1)
                    {
                        $prev = $pageNumber-1;
                        echo "<li class='page-item'>
                                <a class='page-link' href='{$category_page}?page={$prev}&cid={$_GET['cid']}' aria-label='Previous'>
                                    <span aria-hidden='true'>Prev</span>
                                </a>
                            </li>";
                    }
                    $pageNo = isset($_GET['page'])?$_GET['page']:1;
                    $pages = ceil($numberOfRecords/$limit);
                    for($pno = 1; $pno<=$pages; $pno++)
                    {
                        if(!isset($_GET['page']) && $pno==1)
                        {
                            echo "<li class='page-item active'><a class='page-link' href='{$category_page}?page={$pno}&cid={$_GET['cid']}'>{$pno}</a></li>";
                        }
                        else if($pageNo==$pno)
                        {
                            echo "<li class='page-item active'><a class='page-link' href='{$category_page}?page={$pno}&cid={$_GET['cid']}'>{$pno}</a></li>";
                        }
                        else
                        {
                            echo "<li class='page-item'><a class='page-link' href='{$category_page}?page={$pno}&cid={$_GET['cid']}'>{$pno}</a></li>";
                        }
                    }
                    if($pageNumber!=$pages)
                    {
                        $next = $pageNumber+1;
                        echo "<li class='page-item'>
                                <a class='page-link' href='{$category_page}?page={$next}&cid={$_GET['cid']}' aria-label='Next'>
                                    <span aria-hidden='true'>Next</span>
                                </a>
                            </li>";
                    }
            echo  "</ul>
            </nav>";
        ?>
    </div>

    <?php 
        require_once 'userProfileMenu.php';
        require_once 'footer.php' 
    ?>
    <?php } ?>
</body>
    <?php require_once 'scripts.php'; ?>
</html>