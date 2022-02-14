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
        require_once 'dbconnection.php';
        require_once 'navbar.php';
        if(isset($_SESSION['email']))
        {
            header('Location: /charvi/index.php');
        }
        if(isset($_POST['registration']) && ($_POST['password']==$_POST['confirmPassword']) && !isset($_POST['otpsubmit']))
        {
            $email = $_POST['email'];
            $sql = "SELECT * FROM `user` WHERE email='{$email}'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)!=0)
            {
                $error = "Email Address Already Taken!!";
            }
            $_SESSION['Rname'] = mysqli_real_escape_string($con,$_POST['userName']);
            $_SESSION['Remail'] = mysqli_real_escape_string($con,$_POST['email']);
            $_SESSION['Rnumber'] = mysqli_real_escape_string($con,$_POST['mobileNumber']);
            $_SESSION['Rpwd'] = md5(mysqli_real_escape_string($con,$_POST['password']));
            $_SESSION['randomOTP'] = random_int(100000,999999);
        }
        else
        {
            if(isset($_POST['registration']))
            {
                $error = "Password Didn't Match";
            }
        }
        if(isset($_POST['otpsubmit']))
        {
            if($_SESSION['randomOTP'] != $_POST['otp'])
            {
                $error="OTP didn't match";
            }
            else
            {
                $success="Registration Successful";
            }
        }
        if(isset($error))
        {
            require_once 'error.php';
        }
        if(isset($success))
        {
            require_once 'success.php';
            $name = $_SESSION['Rname'];
            unset($_SESSION['Rname']);
            $email = $_SESSION['Remail'];
            unset($_SESSION['Remail']);
            $number = $_SESSION['Rnumber'];
            unset($_SESSION['Rnumber']);
            $pwd = $_SESSION['Rpwd'];
            unset($_SESSION['Rpwd']);
            $sql = "SELECT * FROM role WHERE ROLE_NAME = 'CUSTOMER'";
            $result = mysqli_query($con, $sql);
            if($result)
            {
                $row = mysqli_fetch_assoc($result);
                $role = $row['ROLE_ID'];
                $sql = "INSERT INTO `user`(`USER_ID`, `USER_NAME`, `EMAIL`, `PASSWORD`, `CONTACT`, `ROLE`) VALUES (null,'{$name}','{$email}','$pwd','{$number}','{$role}')";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    unset($_SESSION['randomOTP']);
                    unset($POST);
                    header("Location: /charvi/index.php?success={$success}");
                }
            }
            
            // die();
        }
        if((!isset($_POST['registration']) || isset($error)) && !isset($_POST['otpsubmit']))
        {
            require_once 'registration-form.php';
        }
        else
        {
            if(isset($_SESSION['randomOTP']))
            {
                echo $_SESSION['randomOTP'];   
            }
            require_once 'otp-form.php';
        }
        require_once 'footer.php'
    ?>
</body>
<?php require_once 'scripts.php' ?>
</html>