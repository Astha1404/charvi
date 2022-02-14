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
        require_once 'dbconnection.php';
        if(isset($_POST['submit']) && !isset($_SESSION['email']))
        {
            session_start();
            $sql = "SELECT * FROM user WHERE email = '".$_POST['userName']."' and password = '".$_POST['password']."'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)!=1)
            {
                $error = "User Name Or Password You Entered is Wrong !!";
            }
            else
            {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['userName'] = $row['USER_NAME'];
                $_SESSION['email'] = $row['EMAIL'];
                $sql = "SELECT * FROM role WHERE role_id = '".$row['ROLE']."'";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['role']=$row['ROLE_NAME'];
                header('Location: /charvi/index.php');
            }
        }
        require_once 'navbar.php';
        if(!isset($_POST['getotp']))
        {
            require_once 'login-form.php';
        }
        if(isset($_POST['getotp']))
        {
            $email = $_POST['userName'];
            $sql = "SELECT * FROM user WHERE email = '{$email}'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)!=0)
            {
                require_once 'otp-form.php';
            }
            else
            {
                $error = "User(Email) doesn't exist";
                header("Location: /charvi/login.php?reset=1 & error= {$error}");
            }
        }
        if(isset($error))
        {
            require_once 'error.php';
        }
        require_once 'footer.php';
    ?>
</body>
<?php require_once 'scripts.php' ?>
</html>


<!-- <section> -->
    <!-- <div class="modal fade" id="login">
        <div class="modal-dialog modal-dialog-centered" style="z-index:1;">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel">LOGIN</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="#" class="needs-validation">
                <div class="mb-4 form-floating">
                    <input type="email" class="form-control" id="userName" name="userName" placeholder="User Name" required>
                    <label for="userName">User Name</label>
                </div>
                <div class="mb-4 form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Login</button>
                <button type="button" class="btn btn-primary">Forget Password ?</button>
            </div>
            </form>
        </div>
        </div>
    </div>
</section> -->