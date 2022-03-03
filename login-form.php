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
        <h1 class="text-center">Login</h1>
        <form action="login.php" method="post" class="bg-light d-flex flex-wrap justify-content-center p-4 p-md-0 p-sm-0 need-validation">
            <div class="m-4 form-floating col-md-8 col-sm-12 col-11">
                <input type="email" class="form-control" id="userName" name="userName" placeholder="User Name" required>
                <label for="userName">User Name (Email)</label>
            </div>
            <div class="mb-4 form-floating col-md-8 col-sm-12 col-11">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="col-md-12 col-sm-12 col-12 mb-4 d-flex justify-content-center gap-4">
                <button type="submit" name="loginsubmit" value="loginsubmit" class="btn btn-success px-4">Login</button>
                <a href="login.php?forget=1" name="reset" value="reset" class="btn btn-primary">Forgot Password ?</a>
            </div>
        </form>
    </div>
</section>