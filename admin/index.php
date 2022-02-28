
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
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="panel-body">
		<a>
            <?php  //success message
            if(isset($_POST['success'])) {
            $success = $_POST["success"];
            echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
            }

     ##       if(isset($_POST['success2'])) {
       ##       $success = $_POST["success2"];
         ##     echo "<h1 style='color:#0C0'>Your Category was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
           ##   }

            ?></a>
                </div>

                <div class="left-side">
                  <?php
                    $sql = "SELECT count(*) AS count FROM orders";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $orders = $row['count'];
                    $sql = "SELECT count(*) AS count FROM user";
                    $sql = "SELECT * FROM role WHERE role_name='CUSTOMER'";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $customer = $row['ROLE_ID'];
                    $sql = "SELECT count(*) AS count FROM user WHERE role={$customer}";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $customers = $row['count'];
                    $sql = "SELECT count(*) AS count FROM product";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $products = $row['count'];
                    $sql = "SELECT * FROM orderstatus WHERE status='ACCEPTED'";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $accepted = $row['STATUS_ID'];
                    $sql = "SELECT count(*) AS count FROM orders WHERE status = {$accepted}";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $acceptedOrders = $row['count'];
                  ?>
                  <h1 class="text-dark p-4 bg-light">Total Orders : <?php echo $orders;?></h1>
                  <h1 class="text-dark p-4 bg-light">Total Orders Accepted : <?php echo $acceptedOrders;?></h1>
                  <h1 class="text-dark p-4 bg-light">Total Customers : <?php echo $customers;?></h1>
                  <h1 class="text-dark p-4 bg-light">Total Products : <?php echo $products;?></h1>
     </div>
           <!--          <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Brands List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>Brands</th><th>Count</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select * from brands")or die ("query 1 incorrect.....");
                        $i=1;
                        while(list($brand_id,$brand_title)=mysqli_fetch_array($result))
                        {	
                            
                            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i";
                            $query = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($query);
                            $count=$row["count_items"];
                            $i++;
                        echo "<tr><td>$brand_id</td><td>$brand_title</td><td>$count</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           </div>
           <div class="col-md-5">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Subscribers</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>email</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select * from email_info")or die ("query 1 incorrect.....");

                        while(list($brand_id,$brand_title)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$brand_id</td><td>$brand_title</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
           
            
          
        </div>
      </div>-->
      <?php
include "footer.php";
?>