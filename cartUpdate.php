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
    $sql = "UPDATE cart SET quantity = {$_POST['qty']} WHERE user_id = {$_SESSION['userId']} AND product_id = {$_POST['productId']}";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        echo "success";
    }
?>