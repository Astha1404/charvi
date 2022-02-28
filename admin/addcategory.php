<?php
session_start();
include("db.php");


if(isset($_POST['btn_save']))
{
$category_name=$_POST['category_name'];


mysqli_query($con,"INSERT INTO `category`(`CATEGORY_NAME`) VALUES ('$category_name')") or die ("query incorrect");

 header("location: sumit_form.php?success=2");


mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Category</h5>
              </div>

              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" id="category_name" required name="category_name" class="form-control">
                      </div>
                    </div>
                    <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Product</button>
              </div>
                  </div>
                  </div>
                  </div>
                  </form>
</div>
</div>
<?php
include "footer.php";
?>                 
                  
