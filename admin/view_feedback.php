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
include("db.php");
error_reporting(0);
include "sidenav.php";
include "topheader.php";
?>
<div class="content">
        <div class="container-fluid">
         <div class="panel-body">
<div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">VIEW FEEDBACK</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>Product Image</th><th>Product Name</th><th>UserName</th><th>Feedback</th><th>Rating</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                          
                          //fetch image
                        $product_id=$_GET['product_id'];

                        $result=mysqli_query($con,"select IMAGE from product where PRODUCT_ID='$product_id'")
                        or die("query is incorrect...");

                        list($picture)=mysqli_fetch_array($result);
                        $path="../Assets/Images/Products/$picture";
                        if(file_exists($path)==true)
                        {
                          unlink($path);
                        }
                        else
                        {}
                      

                        /*pagination */                                            
                         
                      //fetch all details
                        $result=mysqli_query($con,"SELECT product.IMAGE,product.PRODUCT_NAME,user.USER_NAME,feedback.FEEDBACK,feedback.RATING FROM feedback INNER JOIN product ON feedback.PRODUCT_ID=product.PRODUCT_ID INNER JOIN user ON feedback.USER_ID=user.USER_ID limit $page1,10")or die ("query 1 incorrect.....");

                        while(list($p_img,$p_name,$u_name,$feedback,$rating)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td><img src='../Assets/Images/Products/$p_img' style='width:60px; height:60px'></td>
                        <td>$p_name</td>
                        <td>$u_name</td>
                        <td>$feedback</td>
                        <td>$rating</td>

                        </tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>

              <nav aria-label="Page navigation example">
              <ul class="pagination">
                 <?php 
                     //counting paging
                      
               $paging=mysqli_query($con,"select FEEDBACK_ID from feedback");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                  
                ?> 
                <li class="page-item"><a class="page-link" href="view_feedback.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
              </ul>
            </nav>
       
            </div>
          </div>
                      
         