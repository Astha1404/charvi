<?php

    $product_images = 'Assets/Images/Products/';
    $product_page = 'product.php';
    $category_page = 'category.php';
    if(!(@$con = mysqli_connect("localhost","root","","charvi")))
    {
        echo '<h1 class="container text-center">503 Service Unavailable</h1>';
        die();
    }
?>