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
<div class="d-flex justify-content-end">
    <a href="cart.php" class="text-decoration-none text-light p-0 position-relative">
        <span class="d-flex justify-content-center align-items-center flex-row">
        <i class="bi bi-bag-check fs-1"></i>
        </span>
        <?php 
            $sql = "SELECT COUNT(*) AS count FROM cart WHERE user_id = {$_SESSION['userId']}";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($result);
            $num = $row['count'];
            if($num>=100)
            {
                $num = "99+";
            }
        ?>
        <span class="position-absolute top-50 start-100 px-2 translate-middle rounded-pill bg-danger">
            <?php echo $num; ?>
        </span>
    </a>
    <a href="#userDashboard" data-bs-toggle="offcanvas" class="text-decoration-none text-light mx-4">
        <span class="d-flex justify-content-center align-items-center flex-row">
            <i class="bi bi-person-circle fs-1"></i>
            <h5 class="my-auto mx-2 text-nowrap"><?php echo $_SESSION['userName']; ?></h5>
        </span>
    </a>
</div>