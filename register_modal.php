<section>
    <div class="modal fade" id="register" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel">Register</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="#" class="needs-validation">
                <div class="mb-2">
                    <label for="userName">Enter Your User Name</label>
                    <input type="userName" class="form-control" id="userName" name="userName" required>
                </div>
                <div class="mb-2">
                    <label for="mobileNumber">Enter Your Mobile Number</label>
                    <input type="number" min="1000000000" max="9999999999" class="form-control" id="mobileNumber" name="mobileNumber" required>
                    <!-- <div class="invalid-feedback">
                        Please Enter Valid Mobile Number
                    </div> -->
                </div>
                <div class="mb-2">
                    <label for="email">Enter Your E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-2">
                    <label for="password">Enter Your Password</label>
                    <input type="password" class="form-control required" id="password" name="password" required>
                </div>
                <div class="mb-2">
                    <label for="password">Confirm Your Password</label>
                    <input type="password" class="form-control" id="password" name="confirmPassword" required>
                </div>
                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>