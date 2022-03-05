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
error_reporting(0);

//accept button

if(isset($_POST['orderAccepted']))
{
  $order_id=$_POST['orderAccepted'];
  $sql = "SELECT status_id FROM orderstatus WHERE status = 'ACCEPTED'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  $status_id = $row['status_id'];
  $sql = "UPDATE orders SET status = $status_id WHERE order_id = {$order_id}";
  $result = mysqli_query($con,$sql);
  if($result);
  {
    echo "<script>window.location.href=order_request.php</script>";
  }
}
if(isset($_POST['orderDeny']))
{
  $order_id=$_POST['orderDeny'];
  $sql = "SELECT status_id FROM orderstatus WHERE status = 'REJECTED'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($result);
  $status_id = $row['status_id'];
  $sql = "UPDATE orders SET status = $status_id WHERE order_id = {$order_id}";
  $result = mysqli_query($con,$sql);
  if($result);
  {
    echo "<script>window.location.href=order_request.php</script>";
  }
}
///pagination

$page=$_GET['page'];

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
        
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Order List</h4>
                
              </div>
              <div class="card-body">
                <div class="ps">
                  <table class="table tablesorter table-responsive" id="page1">
                    <thead class=" text-primary">
                      <tr><th>Order ID<th>User Id</th><th>Name</th><th>Product Id</th><th>product Name</th><th>Price</th><th>Unit Of Maserment</th><th>Quantity</th><th>Total Amount</th><th>Delivery Address</th><th>Current Status</th><th>Accept</th><th>Deny</th></tr></thead>
                    <tbody>
                      <?php 

                        $result=mysqli_query($con,"SELECT  orders.ADDRESS_ID,orders.ORDER_ID,orders.USER_ID,user.USER_NAME,orders.PRODUCT_ID,product.PRODUCT_NAME,product.PRICE,product.QUANTITY,orders.QTY,orderstatus.STATUS FROM orders  INNER JOIN product ON orders.PRODUCT_ID=product.PRODUCT_ID INNER JOIN user ON orders.USER_ID=user.USER_ID INNER JOIN orderstatus ON orders.STATUS=orderstatus.STATUS_ID WHERE orderstatus.status = 'REQUESTED' LIMIT $page1,10")or die ("query 1 incorrect.....");

                        while(list($address_id,$order_id,$user_id,$user_name,$product_id,$product_name,$price,$quantity,$p_qty,$status)=mysqli_fetch_array($result))
                        {
                          $amount=$price * $p_qty ;
                          $sql = "SELECT * FROM ADDRESS WHERE address_id = {$address_id}";
                          $result2 = mysqli_query($con,$sql);
                          $row = mysqli_fetch_assoc($result2);
                          $address =  $row['HOUSE_NO'].", ".$row['BUILDING_NAME'].", ".$row['LANDMARK'].", ".$row['AREA'].", ".$row['CITY'].", ".$row['STATE'].", ".$row['PINCODE'];
                        
                        echo "<form action ={$_SERVER['PHP_SELF']} method='POST'><tr><td>$order_id</td>
                        <td>$user_id</td>
                        <td>$user_name</td>
                        <td>$product_id</td>
                        <td>$product_name</td>
                        <td>$price</td>
                        <td>$quantity</td>
                        <td>$p_qty</td> 
                        <td>$amount</td>
                        <td>$address</td>
                        <td>$status</td>
                        <td>
                        <button class='btn btn-success' name='orderAccepted' value='{$order_id}'>Accept</button>
                        
                        </td>
                        <td><button class='btn btn-success' name='orderDeny' value='{$order_id}'>Deny</button></td>
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

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="order_request.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
                
              </ul>
            </nav>
            
           

          </div>
          
          
        </div>
      </div>
      <?php
include "footer.php";
?>     l