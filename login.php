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
        if(!isset($_SESSION))
        {   
            session_start();
        }
        if(isset($_SESSION['email']))
        {
            header('Location: /charvi/index.php');
        }
        if(isset($_SESSION['email']))
        {
            die("HK");
            header('Location: /charvi/index.php');
        }
        else
        {
            require_once 'navbar.php';
            if(isset($_POST['loginsubmit']))
            {
                $sql = "SELECT * FROM user WHERE email = '".$_POST['userName']."' and password = '".md5($_POST['password'])."'";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)!=1)
                {
                    $error = "User Name Or Password You Entered is Wrong !!";
                    header("Location: /charvi/login.php?error={$error}");
                }
                else
                {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['userName'] = $row['USER_NAME'];
                    $_SESSION['email'] = $row['EMAIL'];
                    $_SESSION['userId'] = $row['USER_ID'];
                    $sql = "SELECT * FROM role WHERE role_id = '".$row['ROLE']."'";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['role']=$row['ROLE_NAME'];
                    header('Location: /charvi/index.php');
                }
            }
            else if(isset($_GET['forget']))
            {
                require_once 'forgetpassword.php';
            }
            else if(isset($_POST['getotp']))
            {
                $_SESSION['Remail'] = $_POST['userName'];
                $sql = "SELECT * FROM user WHERE email = '{$_SESSION['Remail']}'";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)!=0)
                {
                    if(!isset($_SESSION['Rname']))
                    {
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['Rname']=$row['USER_NAME'];
                    }
                    $_SESSION['randomOTP'] = random_int(100000,999999);
                    require_once 'otp-reset.php';
                }
                else
                {
                    $error = "User(Email) doesn't exist";
                    header("Location: /charvi/login.php?forget=1 & error= {$error}");
                }
            }
            else if(isset($_GET['otpsuccess']) && isset($_SESSION['randomOTP']))
            {
                require_once 'otp-reset.php';
            }
            else if(isset($_POST['otpsubmit']))
            {

                if(($_POST['otp']==$_SESSION['randomOTP']))
                {
                    unset($_SESSION['randomOTP']);
                    unset($_SESSION['Rname']);
                    require_once 'reset-password.php';
                }
                else
                {
                    $error = "OTP You Entered is Not Valid";
                    header("Location: /charvi/login.php?otpsuccess=1 & error= {$error}");
                }
            }
            else if(isset($_POST['updatepwd']))
            {
                if($_POST['password'] == $_POST['confpassword'])
                {
                    $pwd = md5($_POST['password']);
                    $sql = "UPDATE user SET password = '{$pwd}' WHERE email = '{$_SESSION['Remail']}'";
                    $result = mysqli_query($con,$sql);
                    if($result)
                    {
                        unset($_SESSION['Remail']);
                        $success = "Password Reset Successfully";
                        header("Location: /charvi/login.php?success={$success}");
                    }
                    else
                    {
                        $error = "Can't Reset Password Right Now, Please Try Again Later";
                        header("Location: /charvi/login.php?error={$error}");
                    }
                }
                else
                {
                    $error="Password Doesn't Match";
                    $_GET['error']=$error;
                    require_once 'reset-password.php';
                }
            }
            else
            {
                require_once 'login-form.php';
            }
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
        require_once 'footer.php';
    ?>
</body>
<?php require_once 'scripts.php' ?>
</html>