<?php
session_start();
include("db.php");
include "sidenav.php";
include "topheader.php";

///pagination

if(isset($_GET['page']))
{
  $page=$_GET['page'];
  
  if($page=="" || $page=="1")
  {
  $page1=0;	
  }
  else
  {
  $page1=($page*7)-7;	
  } 
}
if(isset($_POST['orderDeliver']))
{
  $order_id=$_POST['orderDeliver'];
  $sql = "SELECT status_id FROM orderstatus WHERE status = 'DELIVERED'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  $status_id = $row['status_id'];
  $sql = "UPDATE orders SET status = $status_id WHERE order_id = {$order_id}";
  $result = mysqli_query($con,$sql);
  if($result);
  {
    echo "<script>window.location.href=order_deliver.php</script>";
  }
}

?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Order status list </h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>Order ID<th>User Id</th><th>Name</th><th>Product Id</th><th>product Name</th><th>Price</th><th>Unit Of Maserment</th><th>Quantity</th><th>Total Amount</th><th> Status</th></tr></thead>
                    <tbody>
                      <?php 
                        $sql = "SELECT * FROM ORDERS WHERE STATUS = 2";
                        $result=mysqli_query($con,$sql)or die ("query 1 incorrect.....");

                        while($row = mysqli_fetch_assoc($result))
                        {
                          $order_id = $row['ORDER_ID'];
                          $user_id = $row['USER_ID'];
                          $sql1 = "SELECT * FROM user WHERE user_id = {$user_id}";
                          $result1 = mysqli_query($con,$sql1);
                          $row1 = mysqli_fetch_assoc($result1);
                          $user_name  = $row1['USER_NAME'];
                          $product_id = $row['PRODUCT_ID'];
                          $sql2 = "SELECT * FROM product WHERE product_id = {$product_id}";
                          $result2 = mysqli_query($con,$sql2);
                          $row2 = mysqli_fetch_assoc($result2);
                          $product_name = $row2['PRODUCT_NAME'];
                          $price = $row2['PRICE'];
                          $p_qty = $row['QTY'];
                          $quantity = $row2['QUANTITY'];
                          $status = $row['STATUS'];
                          $sql3 = "SELECT * FROM orderstatus WHERE status_id = {$status}";
                          $result3 = mysqli_query($con,$sql3);
                          $row3 = mysqli_fetch_assoc($result3);
                          $status = $row3['STATUS'];
                          $amount=$price*$p_qty;
                        echo "<form action ={$_SERVER['PHP_SELF']} method='POST'><tr><td>$order_id</td>
                        <td>$user_id</td>
                        <td>$user_name</td>
                        <td>$product_id</td>
                        <td>$product_name</td>
                        <td>$price</td>
                        <td>$quantity gm / PKT</td>
                        <td>$p_qty</td>
                        <td>$amount</td>
                        <td>$status</td>
                        <td>
                        <button class='btn btn-success' name='orderDeliver' value='{$order_id}'>Deliver</button>
                    
                        </td>
                        </tr><form/>";
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

                $paging=mysqli_query($con,"select ORDER_ID from orders");
                $count=mysqli_num_rows($paging);

                $a=$count/7;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="order_deliver.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
                
              </ul>
            </nav>
            
           

          </div>
          
          
        </div>
      </div>
