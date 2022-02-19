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
    <?php require_once 'navbar.php';
        if(!isset($_SESSION))
        {
            session_start();
        }
        if(!isset($_SESSION['email']))
        {
            header('Location: /charvi/index.php');
        }
        if(isset($_POST['saveAddress']))
        {
            $hno = $_POST['houseNo'];
            $bname = $_POST['buildingName'];
            $city = $_POST['city'];
            $area = $_POST['area'];
            $state = $_POST['state'];
            $landmark = $_POST['landmark'];
            $pincode = $_POST['pincode'];
            $userId = $_SESSION['userId'];
            $id = $_POST['saveAddress'];
            $sql = "SELECT * FROM address WHERE address_id = '{$id}'";
            $result = mysqli_query($con,$sql);
            unset($_POST);
            if(mysqli_num_rows($result)==0)
            {
                $sql = "INSERT INTO `address`(`ADDRESS_ID`, `HOUSE_NO`, `BUILDING_NAME`, `CITY`, `AREA`, `STATE`, `LANDMARK`, `PINCODE`, `USER_ID`) VALUES (NULL,'{$hno}','{$bname}','{$city}','{$area}','{$state}','{$landmark}','{$pincode}','{$userId}')";
            }
            else
            {
                $sql = "UPDATE `address` SET `HOUSE_NO`='{$hno}',`BUILDING_NAME`='{$bname}',`CITY`='{$city}',`AREA`='{$area}',`STATE`='{$state}',`LANDMARK`='{$landmark}',`PINCODE`='{$pincode}' WHERE address_id = {$id} AND user_id = {$userId}";
            }
            $result = mysqli_query($con,$sql);
            if($result)
            {
                $success="Your Address is Saved Successfully";
                header("Location: /charvi/Addresses.php?success={$success}");
            }
            else
            {
                $error="Can't Save Your Address Right Now Please Try Again Later";
                header("Location: /charvi/Addresses.php?error={$error}");
            }
        }
        if(isset($_POST['removeAddress']))
        {
            $id = $_POST['removeAddress'];
            $sql = "DELETE FROM `address` WHERE ADDRESS_ID = '$id'";
            $result = mysqli_query($con,$sql);
            unset($_POST);
            if($result)
            {
                $success="Your Address is Saved Successfully";
                header("Location: /charvi/Addresses.php?success={$success}");
            }
            else
            {
                $error="Can't Save Your Address Right Now Please Try Again Later";
                header("Location: /charvi/Addresses.php?error={$error}");
            }
        }
    ?>
    <div class="container-fluid p-0">
        <h1 class="text-center bg-secondary py-4 text-light">Addresses</h1>
        <div class="container">
            <?php
                $sql = "SELECT * FROM `address` WHERE user_id = {$_SESSION['userId']}";
                $result = mysqli_query($con,$sql);
                $i=1;
                while(($row = mysqli_fetch_assoc($result)))
                {   
                    echo "<div class='card my-2'>
                            <form action='{$_SERVER['PHP_SELF']}' method='POST'>
                                <div class='card-header'><h4 class='text-center'>Address {$i}</h4></div>
                                <div class='card-body'>
                                    <div class='row justify-content-center align-items-center my-2'>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>House Number : </h5><input type='text' name='houseNo' id='houseNo' class='form-control' value='{$row['HOUSE_NO']}'>
                                        </div>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>Building Name : </h5><input type='text' name='buildingName' id='buildingName' class='form-control' value='{$row['BUILDING_NAME']}'>
                                        </div>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>City : </h5><input type='text' name='city' id='city' class='form-control' value='{$row['CITY']}'>
                                        </div>
                                    </div>
                                    <div class='row justify-content-center align-items-center my-2'>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>Area : </h5><input type='text' name='area' id='area' class='form-control' value='{$row['AREA']}'>
                                        </div>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>State : </h5><input type='text' name='state' id='state' class='form-control' value='{$row['STATE']}'>
                                        </div>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>Pincode : </h5><input type='number' min='100000' max='999999' class='form-control' id='pincode' name='pincode' oninvalid='this.setCustomValidity(`Please Enter Valid Mobile Number`)' oninput='this.setCustomValidity(``)' value='{$row['PINCODE']}' required>
                                        </div>
                                    </div>
                                    <div class='row my-2'>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>Landmark : </h5><input type='text' name='landmark' class='form-control' value='{$row['LANDMARK']}'>
                                        </div>
                                    </div>
                                </div>
                                <div class='card-footer text-center'>
                                    <button type='submit' name='saveAddress' id='{$i}' value='{$row['ADDRESS_ID']}' class='btn btn-success'>Save</button>
                                    <button type='submit' name='removeAddress' id='{$i}' value='{$row['ADDRESS_ID']}' class='btn btn-danger removeAddress'>Remove</button>
                                </div>
                            </form>
                        </div>";
                        $i++;
                }
                if(isset($_GET['new']))
                {
                    echo "<div class='card'>
                            <form action='{$_SERVER['PHP_SELF']}' method='POST'>
                                <input type='number' name='temp' style='display:none;' value=''>
                                <div class='card-header'><h4 class='text-center'>Address {$i}</h4></div>
                                <div class='card-body'>
                                    <div class='row justify-content-center align-items-center my-2'>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>House Number : </h5><input type='text' name='houseNo' id='houseNo' class='form-control'}'>
                                        </div>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>Building Name : </h5><input type='text' name='buildingName' id='buildingName' class='form-control'>
                                        </div>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>City : </h5><input type='text' name='city' id='city' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='row justify-content-center align-items-center my-2'>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>Area : </h5><input type='text' name='area' id='area' class='form-control'>
                                        </div>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>State : </h5><input type='text' name='state' id='state' class='form-control'>
                                        </div>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>Pincode : </h5><input type='number' min='100000' max='999999' class='form-control' id='pincode' name='pincode' oninvalid='this.setCustomValidity(`Please Enter Valid Mobile Number`)' oninput='this.setCustomValidity(``)' required>
                                        </div>
                                    </div>
                                    <div class='row my-2'>
                                        <div class='col'>
                                            <h5 class='d-inline text-nowrap'>Landmark : </h5><input type='text' name='landmark' class='form-control' value='".(isset($row)?$row['LANDMARK']:'')."'>
                                        </div>
                                    </div>
                                </div>
                                <div class='card-footer text-center'>
                                    <button type='submit' name='saveAddress' id='{$i}' value='".(isset($row)?$row['ADDRESS_ID']:'')."' class='btn btn-success'>Save</button>
                                </div>
                            </form>
                        </div>";
                }
            ?>
            <div class="container d-flex justify-content-end my-4">
                <a class="btn rounded-circle btn-primary" href="<?php echo "{$_SERVER['PHP_SELF']}?new={$i}"; ?>">+</a>
            </div>
        </div>
    </div>
    <?php
        require_once 'userDashboard.php';
        
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
<?php require_once 'scripts.php'; ?>
</html>