<?php
session_start();
include("db.php");
include "sidenav.php";
include "topheader.php";
#if(isset($_POST['btn_save']))
#{
//$user_id=$_POST['user_id'];
/*$user_name=$_POST['user_name'];
$email=$_POST['email'];
$user_password=$_POST['password'];
$mobile=$_POST['phone'];
$role_id=$_POST['role'];*/
//$address2=$_POST['country'];

#mysqli_query($con,"insert into user(USER_NAME,EMAIL,PASSWORD,CONTACT) values ('$user_name','$email','$user_password','$mobile')") 		or die ("Query 1 is inncorrect........");
#header("location: manage_users.php"); 
#mysqli_close($con);
#}


?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Admin</h4>
                  <p class="card-category">Admin profile</p>
                </div>
                <div class="card-body">
                  <form action="" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">
                      
                    <!--  <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating"> User Id</label>
                          <input type="text" id="user_id" name="user_id" class="form-control" required>
                        </div>
                      </div>-->
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Admin Name</label>
                          <input type="text" name="user_name" id="user_name"  class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">phone number</label>
                          <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                      </div>
                    </div>
                   <!--   <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" name="country" id="country" class="form-control" required>
                        </div>
                      </div>-->
                      
                    </div>
                    <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Admin</button>
                   </div>
                   
                  </form>
                </div>
              </div>
            </div>
            </div>
        
        
    
<?php
include "footer.php";
?>