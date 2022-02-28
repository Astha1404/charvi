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


if(isset($_POST['addProduct']))
{
  $pname = mysqli_real_escape_string($con,$_POST['productName']);
  $price = mysqli_real_escape_string($con,$_POST['price']);
  $desc = mysqli_real_escape_string($con,$_POST['description']);
  $qty = mysqli_real_escape_string($con,$_POST['quantity']);
  $category = mysqli_real_escape_string($con,$_POST['category']);
  $img = mysqli_real_escape_string($con,$_FILES['image']['name']);
  $company = mysqli_real_escape_string($con,$_POST['company']);
  $tmp_img = mysqli_real_escape_string($con,$_FILES['image']['tmp_name']);
  $sql = "INSERT INTO `product`(`PRODUCT_ID`, `PRODUCT_NAME`, `PRICE`, `DESCRIPTION`, `QUANTITY`, `CATEGORY_ID`, `COMPANY_ID`, `IMAGE`) VALUES (NULL,'{$pname}','{$price}','{$desc}','{$qty}','{$category}','{$company}','{$img}')";
  $result = mysqli_query($con,$sql);
  if($result)
  {
      move_uploaded_file($tmp_img,"../Assets/Images/Products/{$img}");
  }
  else
  {
    header("Location: /charvi/admin/addproduct.php?error=Can't Add Product");
  }
  header("Location: /charvi/admin/addproduct.php?success=Product Added Successfully");
}
if(isset($_POST['updateProduct']))
{
  $pname = mysqli_real_escape_string($con,$_POST['productName']);
  $price = mysqli_real_escape_string($con,$_POST['price']);
  $desc = mysqli_real_escape_string($con,$_POST['description']);
  $qty = mysqli_real_escape_string($con,$_POST['quantity']);
  $sql = "UPDATE `product` SET `PRODUCT_NAME`='{$pname}',`PRICE`='{$price}',`DESCRIPTION`='{$desc}',`QUANTITY`='{$qty}' WHERE PRODUCT_ID = {$_POST['updateProduct']}";
  $result = mysqli_query($con,$sql);
  if($result)
  {
    header("Location: /charvi/admin/addproduct.php?success=Product Updated Successfully");
  }
  else
  {
    header("Location: /charvi/admin/addproduct.php?error=Can't Update Product");
  }
}

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          <?php
          if(!isset($_GET['id']))
          {
          ?>
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Product</h5>
              </div>
              <div class="card-body">          
                  <div class="row">  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="productName" required name="productName" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="file" name="image" required class="btn btn-fill btn-success" id="image" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="description" required name="description" class="form-control"></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pricing</label>
                        <input type="text" id="price" name="price" required class="form-control" >
                      </div>
                    </div>
                  
                 
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" id="quantity" name="quantity" required class="form-control" >
                      </div>
                    </div>
                  </div>
              </div>           
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Categories</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <select name="category" id="category" class="form-control">
                            <option value="0">Select Category</option>
                            <?php
                                require '../dbconnection.php';
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($con,$sql);
                                if(mysqli_num_rows($result)>0)
                                {
                                    while(($row = mysqli_fetch_assoc($result))!=null)
                                    {
                                        echo "<option value={$row['CATEGORY_ID']}>{$row['CATEGORY_NAME']}</option>";
                                        // die(print_r($row));
                                    }
                                }
                            ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <select name="company" id="company" class="form-control">
                              <option value="0">Select Company</option>
                              <?php
                                  require '../dbconnection.php';
                                  $sql = "SELECT * FROM company";
                                  $result = mysqli_query($con,$sql);
                                  if(mysqli_num_rows($result)>0)
                                  {
                                      while(($row = mysqli_fetch_assoc($result))!=null)
                                      {
                                          echo "<option value={$row['COMPANY_ID']}>{$row['COMPANY_NAME']}</option>";
                                          // die(print_r($row));
                                      }
                                  }
                              ?>
                          </select>
                      </div>
                    </div>
                     
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="addProduct" name="addProduct" required class="btn btn-fill btn-primary">Add Product</button>
              </div>
            </div>
          </div>
          <?php 
          }
          else
          {
            $sql = "SELECT * FROM product WHERE PRODUCT_ID = {$_GET['id']}";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)==1)
            {
              $row = mysqli_fetch_assoc($result);
              $product_name = $row['PRODUCT_NAME'];
              $product_id = $row['PRODUCT_ID'];
              $price = $row['PRICE'];
              $description = $row['DESCRIPTION'];
              $qty = $row['QUANTITY'];
              $company = $row['COMPANY_ID'];
              $category = $row['CATEGORY'];
            }
            else
            {
              echo "<h1 class='text-light'> No Product Found </h1>";
            }

          ?>
          <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Update Product</h5>
              </div>
              <div class="card-body">          
                  <div class="row">  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="productName" required name="productName" class="form-control" value="<?php echo $product_name; ?>">
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="description" required name="description" class="form-control" ><?php echo $description; ?></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pricing</label>
                        <input type="text" id="price" name="price" required class="form-control" value="<?php echo $price; ?>">
                      </div>
                    </div>
                  
                 
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" id="quantity" name="quantity" required class="form-control" value="<?php echo $qty;?>">
                      </div>
                    </div>
                  </div>
                  
              </div>        
              <div class="card-footer">
                  <button type="submit" id="updateProduct" value="<?php echo $_GET['id'] ?>" name="updateProduct" required class="btn btn-fill btn-primary">Update Product</button>
              </div>   
            </div>
            
          </div>
              
            </div>
          </div>
          
          </div>
          <?php
          }
          ?>
          </div>
          
         </form>
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
         ?>
          
   </div>
        </div>
      <?php
include "footer.php";
?>