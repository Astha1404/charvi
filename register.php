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
        if(!isset($_SESSION))
        {
            session_start();
        }
        if(isset($_SESSION['email']))
        {
            header('Location: /charvi/index.php');
        }
        require_once 'dbconnection.php';
        require_once 'navbar.php';
        if(isset($_POST['registration']))
        {
            if($_POST['password']!=$_POST['confirmPassword'])
            {
                $error = "Password Didn't Match";
                echo "<script>window.location.href='register.php?error={$error}';</script>";
            }
            else
            {
                $email = $_POST['email'];
                $sql = "SELECT * FROM `user` WHERE email='{$email}'";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)!=0)
                {
                    $error = "Email Address Already Taken!!";
                    echo "<script>window.location.href='register.php?error={$error}';</script>";
                    
                }
                else
                {
                    $_SESSION['Rname'] = mysqli_real_escape_string($con,$_POST['userName']);
                    $_SESSION['Remail'] = mysqli_real_escape_string($con,$_POST['email']);
                    $_SESSION['Rnumber'] = mysqli_real_escape_string($con,$_POST['mobileNumber']);
                    $_SESSION['Rpwd'] = md5(mysqli_real_escape_string($con,$_POST['password']));
                    $_SESSION['randomOTP'] = random_int(100000,999999);
                    require_once 'otp-form.php';
                }
            }
        }
        else if(isset($_GET['otpsuccess']) || isset($_GET['otperror']))
        {
            require_once 'otp-form.php';
        }
        else if(isset($_POST['otpsubmit']))
        {
            if($_SESSION['randomOTP']==$_POST['otp'])
            {
                $name = $_SESSION['Rname'];
                $email = $_SESSION['Remail'];
                $number = $_SESSION['Rnumber'];
                $pwd = $_SESSION['Rpwd'];
                $sql = "SELECT * FROM role WHERE ROLE_NAME = 'CUSTOMER'";
                $result = mysqli_query($con, $sql);
                if($result)
                {
                    $row = mysqli_fetch_assoc($result);
                    $role = $row['ROLE_ID'];
                    $sql = "INSERT INTO `user`(`USER_ID`, `USER_NAME`, `EMAIL`, `PASSWORD`, `CONTACT`, `ROLE`) VALUES (null,'{$name}','{$email}','$pwd',{$number},'{$role}')";
                    $result = mysqli_query($con,$sql);
                    if($result)
                    {
                        unset($_SESSION['Rname']);
                        unset($_SESSION['Remail']);
                        unset($_SESSION['Rnumber']);
                        unset($_SESSION['Rpwd']);
                        unset($_SESSION['randomOTP']);
                        $success="Registration Successful";
                        echo "<script>window.location.href='index.php?success={$success}';</script>";
                        die();
                    }
                }
            }
            else
            {
                $error="OTP didn't match";
                echo "<script>window.location.href='register.php?error={$error} & otperror=1';</script>";
                die();
            }
            require_once 'otp-form.php';
        }
        else
        {
            require_once 'registration-form.php';
        }
        if(isset($_GET['error']))
        {
            $error = $_GET['error'];
            require_once 'error.php';
        }
        if(isset($_GET['success']))
        {
            $error = $_GET['success'];
            require_once 'success.php';
        }
        require_once 'footer.php'
    ?>
</body>
<?php require_once 'scripts.php' ?>
</html>