<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
    <?php
        if(!isset($_SESSION))
        {   
            session_start();
        }
        if(!isset($_SESSION['email']))
        {
            header('Location: /charvi/login.php');
        }
        require_once 'navbar.php';
        require_once 'dbconnection.php';
        if(isset($_POST['save']))
        {
            $name = $_POST['name'];
            $mobile = $_POST['mobileNumber'];
            $sql = "UPDATE user SET user_name = '{$name}',contact={$mobile} WHERE email='{$_SESSION['email']}'";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                $_SESSION['userName'] = $_POST['name'];
                $success="Your Changes Saved Successfully";
                echo "<script>window.location.href='userProfile.php?success={$success}';</script>";
            }
            else
            {
                $error="Can't Save Changes";
                header("Location: /charvi/userProfile.php?error={$error}");
            }
        }
        $sql = "SELECT * FROM user WHERE email = '{$_SESSION['email']}'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        $contact = $row['CONTACT'];
        $role = $row['ROLE'];
        $sql = "SELECT * FROM role WHERE role_id = {$role}";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        $role = $row['ROLE_NAME'];
    ?>
    <div class="container-fluid p-0">
        <h1 class="text-center py-4 text-light bg-secondary">Profile</h1>
        <section class="container">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="mb-3 mw-75 w-75 mx-auto">
                    <label for="name"><h4>Name</h4></label>
                    <input type="text" id="name" name="name" class="form-control text-center fs-4" value="<?PHP echo $_SESSION['userName']; ?>" required/>
                </div>
                <div class="mb-3 mw-75 w-75 mx-auto">
                    <label for="email"><h4>E-mail</h4></label>
                    <input type="text" id="email" name="email" class="form-control text-center fs-4" value="<?PHP echo $_SESSION['email']; ?>" disabled required/>
                    
                </div>
                <div class="mb-3 mw-75 w-75 mx-auto">
                    <label for="number"><h4>Mobile</h4></label>
                    <input type="number" min="1000000000" max="9999999999" class="form-control fs-4" id="mobileNumber" name="mobileNumber" oninvalid="this.setCustomValidity('Please Enter Valid Mobile Number')" oninput="this.setCustomValidity('')" value="<?PHP echo $contact; ?>" required>
                    
                </div>
                <div class="mb-3 mw-75 w-75 mx-auto">
                    <label for="role"><h4>Account Type</h4></label>
                    <input type="text" id="role" name="role" class="form-control text-center fs-4" value="<?PHP echo $role; ?>" disabled required/>
                </div>
                <div class="my-3 mw-75 w-75 mx-auto text-center">
                    <button type="submit" name="save" value="save" class="btn btn-success">Save</button>
                </div>
            </form>
        </section>
    </div>
    <?php
        if(isset($_GET['error']))
        {
            $success=$_GET['error'];
            require_once 'error.php';
        }
        if(isset($_GET['success']))
        {
            $success=$_GET['success'];
            require_once 'success.php';
        }
        require_once 'userDashboard.php';
        require_once 'footer.php';
    ?>
</body>
        <?php require_once 'scripts.php'; ?>
</html>