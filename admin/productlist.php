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


if(isset($_POST['deleteProduct']))
{
  $sql = "DELETE FROM product WHERE product_id = {$_POST['deleteProduct']}";
  $result = mysqli_query($con,$sql);
  if($result)
  {
    echo "<script>window.location.href='productlist.php?success=Product Deleted Successfully'</script>";
  }
  else
  {
    echo "<script>window.location.href='productlist.php?error=Product Deletion Failed'</script>";
  }
}


///pagination
$page= isset($_GET['page'])?$_GET['page']:"";

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
} 
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
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
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Products List</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>Image</th><th>Name</th><th>Price</th><th>Description</th><th>Unit Of Maserment</th><th>Category</th><th>
	<a class=" btn btn-primary" href="addproduct.php">Add New</a></th></tr></thead>
                    <tbody>
                      <?php 

                        $result=mysqli_query($con,"select product.PRODUCT_ID,product.IMAGE, product.PRODUCT_NAME,product.PRICE,	product.DESCRIPTION,product.QUANTITY,category.CATEGORY_NAME from product INNER JOIN category ON product.CATEGORY_ID=category.CATEGORY_ID  Limit $page1,12")or die ("query 1 incorrect.....");

                        while(list($product_id,$image,$product_name,$price,$details,$p_qty,$cat_name)=mysqli_fetch_array($result))
                        {
                        echo "<form action={$_SERVER['PHP_SELF']} method='POST'><tr><td><img src='../Assets/Images/Products/$image' style='width:200px; height: 100px;px'></td>
                        <td>$product_name</td>
                        <td>$price</td>
                        <td>$details</td>
                        <td>$p_qty</td>
                        <td>$cat_name</td>
                        <td><button type='submit' name='deleteProduct' class='btn btn-success' value='{$product_id}'>Delete</button></td>
                        <td><a class='btn btn-success' href='addproduct.php?id={$product_id}'>Edit</a></td>
                        </tr></form>";
                        }

                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                 <?php 
                     //counting paging

                $paging=mysqli_query($con,"select PRODUCT_ID,IMAGE, PRODUCT_NAME,PRICE from product");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="productlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
              </ul>
            </nav>
            
           

          </div>
          
          
        </div>
      </div>
 