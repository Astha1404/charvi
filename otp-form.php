<section class="my-4">
    <div class="container col-md-6 col-sm-12 col-12">
        <h1 class="text-center">Enter OTP</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="bg-light d-flex flex-wrap justify-content-center p-4 p-md-0 p-sm-0 need-validation">
            <div class="m-4 form-floating col-md-8 col-sm-12 col-11">
                <input type="number" class="form-control" id="otp" name="otp" placeholder="Enter The OTP" oninvalid="this.setCustomValidity('Please Enter Valid OTP')" oninput="this.setCustomValidity('')" required>
                <label for="otp">OTP</label>
            </div>
            <div class="col-md-12 col-sm-12 col-12 mb-4 d-flex justify-content-center gap-4">
                <button type="submit" class="btn btn-primary px-4" name="otpsubmit" id="otpsubmit" value="otpsubmit">Submit</button>
            </div>
        </form>
    </div>
</section>