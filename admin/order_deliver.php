<?php
session_start();
include("db.php");
include "sidenav.php";
include "topheader.php";

///pagination

$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*7)-7;	
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

                        $result=mysqli_query($con,"SELECT  orders.ORDER_ID ,orders.USER_ID,user.USER_NAME,orders.PRODUCT_ID,product.PRODUCT_NAME,product.PRICE,product.QUANTITY,orders.QTY,orderstatus.STATUS FROM orders  INNER JOIN product ON orders.PRODUCT_ID=product.PRODUCT_ID INNER JOIN user ON orders.USER_ID=user.USER_ID INNER JOIN orderstatus ON orders.STATUS=orderstatus.STATUS_ID where orders.status=3 Limit $page1,7")or die ("query 1 incorrect.....");

                        while(list($order_id,$user_id,$user_name,$product_id,$product_name,$price,$quantity,$p_qty,$status)=mysqli_fetch_array($result))
                        {
                          $amount=$price*$p_qty;
                        echo "<form action ={$_SERVER['PHP_SELF']} method='POST'><tr><td>$order_id</td>
                        <td>$user_id</td>
                        <td>$user_name</td>
                        <td>$product_id</td>
                        <td>$product_name</td>
                        <td>$price</td>
                        <td>$quantity</td>
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
