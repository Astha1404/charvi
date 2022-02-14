<?php
    require 'dbconnection.php';
?>

<header>
    <?php 
        session_start();
    ?>
    <nav class="navbar navbar-expand-md navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="Assets/Images/logo.jpg" class="img-fluid logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-around" id="navbarSupportedContent">
          <div class="col-1"></div>
          <ul class="navbar-nav justify-content-around mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                <?php
                  $sql = "SELECT * FROM category";
                  $result = mysqli_query($con,$sql);
                  if(mysqli_num_rows($result)>0)
                  {
                      while(($row = mysqli_fetch_assoc($result))!=null)
                      {
                          echo "<li><a class='dropdown-item' href={$category_page}?cid={$row['CATEGORY_ID']}>{$row['CATEGORY_NAME']}</a></li>";
                      }
                  }
                ?>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
          </ul>
          <div class="col-2"></div>
          <div class="d-flex">
            <?php 
              if(!isset($_SESSION['email']))
              {
            ?>
            <a class="btn btn-success mx-2" href="login.php">Login</a>
            <a class="btn btn-primary mx-2" href="register.php">Register</a>
            <?php 
              }
              else
              { 
                require_once 'userProfile.php';
              } 
            ?>
          </div>
        </div>
      </div>
    </nav>
</header>
