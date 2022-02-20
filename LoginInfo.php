<?php
    if(!isset($_SESSION))
    {   
        session_start();
    }
    if(!isset($_SESSION['email']))
    {
        header('Location: /charvi/index.php');
    }
?>

<a href="#userDashboard" data-bs-toggle="offcanvas" class="text-decoration-none text-light">
    <span class="d-flex justify-content-center align-items-center flex-row">
        <i class="bi bi-person-circle fs-1"></i>
        <h5 class="my-auto mx-2 text-nowrap"><?php echo $_SESSION['userName']; ?></h5>
    </span>
</a>