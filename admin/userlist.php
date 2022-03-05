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
include "sidenav.php";
include "topheader.php";
?>
<div class="content">
        <div class="container-fluid">
         <div class="panel-body">
<div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Users List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>ID</th><th>UserName</th><th>Email</th><th>Password</th><th>Contact</th><th>Role</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"SELECT user.USER_ID,user.USER_NAME,user.EMAIL,user.PASSWORD,user.CONTACT,role.ROLE_NAME FROM user INNER JOIN role ON user.ROLE=role.ROLE_ID")or die ("query 1 incorrect.....");

                        while(list($user_id,$user_name,$email,$password,$phone,$role)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$user_id</td><td>$user_name</td><td>$email</td><td>$password</td><td>$phone</td><td>$role</td>

                        </tr>";
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

                $paging=mysqli_query($con,"select USER_ID from user");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="userlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
              </ul>
            </nav>
 
          </div>
</div>
</div>