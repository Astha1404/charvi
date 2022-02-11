<?php
    require 'dbconnection.php';
?>

<header>
    <nav class="navbar navbar-expand-md navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="Assets/Images/logo.jpg" class="img-fluid logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-around" id="navbarSupportedContent">
          <div class="col-1"></div>
          <ul class="navbar-nav justify-content-around mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                          echo "<li><a class='dropdown-item' href={$row['CATEGORY_ID']}>{$row['CATEGORY_NAME']}</a></li>";
                          // die(print_r($row));
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
            <button class="btn btn-success mx-2" type="button"  data-bs-toggle="modal" data-bs-target="#login">Login</button>
            <button class="btn btn-primary mx-2" type="button" data-bs-toggle="modal" data-bs-target="#register">Register</button>
          </div>
        </div>
      </div>
    </nav>
</header>
<?php require 'login_modal.php'?>
<?php require 'register_modal.php'?>
