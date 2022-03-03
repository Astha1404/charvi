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
     <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Admin</a>
            
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <h4><?php echo $_SESSION['userName']; ?><i class="material-icons">person</i></h4>
                  
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      