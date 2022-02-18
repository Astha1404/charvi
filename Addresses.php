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
    ?>
    <div class="container-fluid p-0">
        <h1 class="text-center bg-secondary py-4 text-light">Addresses</h1>
        <div class="container">
            <div class="card">
                <div class="card-header"><h4 class="text-center">Address1</h4></div>
                <div class="card-body">
                    <div class="row justify-content-center align-items-center my-2">
                        <div class="col">
                            <h5 class="d-inline">House Number : </h5><input type="text" class="form-control">
                        </div>
                        <div class="col">
                            <h5 class="d-inline">Building Name : </h5><input type="text" class="form-control">
                        </div>
                        <div class="col">
                            <h5 class="d-inline">City : </h5><input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center my-2">
                        <div class="col">
                            <h5 class="d-inline">Area : </h5><input type="text" class="form-control">
                        </div>
                        <div class="col">
                            <h5 class="d-inline">State : </h5><input type="text" class="form-control">
                        </div>
                        <div class="col">
                            <h5 class="d-inline">Pincode : </h5><input type="number" min="100000" max="999999" class="form-control" id="pincode" name="pincode" oninvalid="this.setCustomValidity('Please Enter Valid Mobile Number')" oninput="this.setCustomValidity('')" value="" required>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col">
                            <h5 class="d-inline">Landmark : </h5><input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-success">Remove</button>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require_once 'userDashboard.php'; 
        require_once 'footer.php'; 
    ?>
</body>
<?php require_once 'scripts.php'; ?>
</html>