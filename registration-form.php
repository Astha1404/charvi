<?php
    if(!isset($_SESSION))
    {   
        session_start();
    }
    if(isset($_SESSION['email']))
    {
        header('Location: /charvi/index.php');
    }
?>


<section class="my-4">
    <div class="container col-md-6 col-sm-12 col-12">
        <h1 class="text-center">Register</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="bg-light d-flex flex-wrap justify-content-center p-4 p-md-0 p-sm-0 need-validation">
            <div class="m-4 form-floating col-md-8 col-sm-12 col-11">
                <input type="userName" class="form-control" id="userName" name="userName" placeholder="Enter Your User Name" oninvalid="this.setCustomValidity('Please Enter Your Name')" oninput="this.setCustomValidity('')" required>
                <label for="userName">Enter Your User Name</label>
            </div>
            <div class="mb-4 form-floating col-md-8 col-sm-12 col-11">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email Address" required>
                <label for="userName">Enter Your Email Address</label>
            </div>
            <div class="mb-4 form-floating col-md-8 col-sm-12 col-11">
                <input type="number" min="1000000000" max="9999999999" class="form-control" id="mobileNumber" placeholder="Enter Your Mobile Number" name="mobileNumber" oninvalid="this.setCustomValidity('Please Enter Valid Mobile Number')" oninput="this.setCustomValidity('')" required>
                <label for="mobileNumber">Enter Your Mobile Number</label>
            </div>
            <div class="mb-4 form-floating col-md-8 col-sm-12 col-11">
            <input type="password" class="form-control required" id="password" name="password" placeholder="Enter Your Password" required>
                    <label for="password">Enter Your Password</label>
            </div>
            <div class="mb-4 form-floating col-md-8 col-sm-12 col-11">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Your Password" required>
                <label for="confirmPassword">Confirm Your Password</label>
            </div>
            
            <div class="col-md-12 col-sm-12 col-12 mb-4 d-flex justify-content-center gap-4">
            <button type="submit" class="btn btn-primary px-4" name="registration" id="registration" value="registration">Register</button>
            </div>
        </form>
    </div>
</section>