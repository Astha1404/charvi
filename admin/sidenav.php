<!doctype html>
<html lang="en">
<?php 
  if(!isset($_SESSION))
  {
    session_start();
  }
  if(!isset($_SESSION['email']))
  {
    echo "<script>window.location.href='../index.php'</script>";
  }
  if($_SESSION['ROLE']!="ADMIN")
  {
    echo "<script>window.location.href='../index.php'</script>";
  }
?>
<head>
  <title>Hello, world!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="assets/css/Material+Icons.css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!--<link rel="stylesheet" href="assets/css/font-awesome.css">-->
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="assets/css/black-dashboard.css" rel="stylesheet" />
  <style>
.navbar-brand
{
color:white;
}
</style>
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="" class="simple-text logo-normal">
            Shree Umiya Gruh Udhayog 
        </a>
      </div>
    <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="3a8db1f4-24d8-4dbf-85c9-4f5215c1b29a">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">
              <i class="material-icons"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="userlist.php">
              <i class="material-icons"></i>
              <p>User List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="Addadmin.php">
              <i class="material-icons"></i>
              <p>Add Admin</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="productlist.php">
              <i class="material-icons"></i>
              <p>Product List</p>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="categorylist.php">
              <i class="material-icons"></i>
              <p>Category List</p>
            </a>
            </li>
          
          
          <li class="nav-item ">
            <a class="nav-link" href="order_request.php">
              <i class="material-icons"></i>
              <p>Orders Request</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="addproduct.php">
              <i class="material-icons"></i>
              <p>Add Products</p>
            </a>
          </li>
         <!---- <li class="nav-item ">
            <a class="nav-link" href="addcategory.php">
              <i class="material-icons"></i>
              <p>Add Category</p>
            </a>
          </li>----->
          <!--<li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons"></i>
              <p>Add Offer</p>
            </a>
          </li>-->
         
          
          <li class="nav-item ">
            <a class="nav-link" href="view_feedback.php">
              <i class="material-icons"></i>
              <p>View Feedback</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../logout.php">
              <i class="material-icons"></i>
              <p>Logout</p>
            </a>
          </li>
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    
  </body>
  </html>