<?php
if(!isset($_SESSION))
{
  session_start();
}
if(!isset($_SESSION['email']))
{
  echo "<script>window.location.href='../index.php'</script>";
}
if($_SESSION['ROLE']!="ADMIN")
{
  echo "<script>window.location.href='../index.php'</script>";
}
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

if(isset($_POST['addAdmin']))
{
  $email = $_POST['email'];
  $sql = "SELECT * FROM user WHERE email = '{$email}'";
  $result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result)==1)
  {
    $sql = "SELECT * FROM role WHERE role_name = 'ADMIN'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $admin = $row['ROLE_ID'];
    $sql = "UPDATE user SET role = {$admin} WHERE email = '{$email}'";
    $result = mysqli_query($con,$sql);
    if($result)
    {
      $success = "Admin Added Successfully";
      echo "<script>window.location.href='Addadmin.php?success={$success}'</script>";
    }
  }
  else
  {
    echo "<script>window.location.href='Addadmin.php?error=User Email Not Found'</script>";
  }
}
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
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" name="email" id="email" class="form-control" required>
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
                    <button type="submit" id="addAdmin" name="addAdmin" class="btn btn-fill btn-primary">Update Admin</button>
                   </div>
                   
                  </form>
                </div>
              </div>
            </div>
            </div>
        
        
    
<?php
if(isset($_GET['error']))
{
    $error = $_GET['error'];
    require_once '../error.php';
}
if(isset($_GET['success']))
{
    $success = $_GET['success'];
    require_once '../success.php';
}
include "footer.php";
?>