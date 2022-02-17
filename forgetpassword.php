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
        <h1 class="text-center">Forget Password</h1>
        <form action="login.php" method="post" class="bg-light d-flex flex-wrap justify-content-center p-4 p-md-0 p-sm-0 need-validation">
            <div class="m-4 form-floating col-md-8 col-sm-12 col-11">
                <input type="email" class="form-control" id="userName" name="userName" placeholder="User Name" required>
                <label for="userName">User Name (Email)</label>
            </div>
            <div class="col-md-12 col-sm-12 col-12 mb-4 d-flex justify-content-center gap-4">
                <button type="submit" name="getotp" value="getotp" class="btn btn-success px-4">Get OTP</button>
            </div>
        </form>
    </div>
</section>