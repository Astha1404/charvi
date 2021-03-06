<?php
    require 'dbconnection.php';
?>

<header>
    <?php 
        if(!isset($_SESSION))
        {
            session_start();
        }
        if(isset($_SESSION['ROLE']))
        {
          if($_SESSION['ROLE']=="ADMIN")
          {
              echo "<script>window.location.href='Admin/index.php'</script>";
          }
        }
    ?>
    <nav class="navbar navbar-expand-md navbar-dark">
          <a class="navbar-brand m-2" href="index.php">
              <img src="Assets/Images/logo.jpg" class="img-fluid logo">
          </a>
          <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="container-fluid col-12 d-md-none">
              <?php
                if(isset($_SESSION['email']))
                {
              ?>
              <div class="d-md-none d-sm-flex col-12 justify-content-end align-items-center mx-0">
              <?php
                    require_once 'LoginInfo.php';
                }
              ?>
              </div>
          </div>
          <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
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
                  <a class="nav-link text-nowrap" href="#">About Us</a>
                </li>
              </ul>
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
              ?>
              <div class="d-sm-none d-none d-md-flex">
                <?php 
                    require 'LoginInfo.php';
                ?>
              </div>
              <?php
                } 
              ?>
            </div>
          </div>
    </nav>
</header>
