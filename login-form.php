<section class="my-4">
    <div class="container col-md-6 col-sm-12 col-12">
        <h1 class="text-center">
            <?php 
                if(!isset($_GET['reset']))
                {
                    echo "Login";
                }
                else
                {
                    if(isset($_GET['error']))
                    {
                        $error = $_GET['error'];
                    }
                    echo "Reset Password";
                }
            ?>
        </h1>
        <form action="<?php echo "login.php"; ?>" method="post" class="bg-light d-flex flex-wrap justify-content-center p-4 p-md-0 p-sm-0 need-validation">
            <div class="m-4 form-floating col-md-8 col-sm-12 col-11">
                <input type="email" class="form-control" id="userName" name="userName" placeholder="User Name" required>
                <label for="userName">User Name (Email)</label>
            </div>
            <?php
                if(!isset($_GET['reset']) && !isset($_POST['getotp']))
                {
            ?>
                <div class="mb-4 form-floating col-md-8 col-sm-12 col-11">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
            <?php 
                }
            ?>
            <div class="col-md-12 col-sm-12 col-12 mb-4 d-flex justify-content-center gap-4">
            <?php
                if(!isset($_GET['reset']) && !isset($_POST['getotp']))
                {
            ?>
                <button type="submit" name="submit" value="submit" class="btn btn-success px-4">Login</button>
                <a href="<?php echo $_SERVER['PHP_SELF'].'?reset=1'; ?>" name="reset" value="reset" class="btn btn-primary">Forget Password ?</a>
            <?php 
                }
                else
                {
            ?>
                <button type="submit" name="getotp" value="getotp" class="btn btn-success px-4">Generate OTP</button>
            <?php
                }
            ?>
            </div>
        </form>
    </div>
</section>