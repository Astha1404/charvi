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
if(isset($_POST['deleteCategory']))
{
  $sql = "DELETE FROM category WHERE category_id = {$_POST['deleteCategory']}";
  $result = mysqli_query($con,$sql);
  if($result)
  {
    echo "<script>window.location.href='categorylist.php?success=Category Deleted Successfully'</script>";
  }
  else
  {
    echo "<script>window.location.href='categorylist.php?error=Category Deletion Failed'</script>";
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
                <h4 class="card-title"> Category List</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>Id</th><th>Name</th><th>
	<a class=" btn btn-primary" href="addcategory.php">Add New</a></th></tr></thead>
                    <tbody>
                      <?php 

$result=mysqli_query($con,"select CATEGORY_ID,CATEGORY_NAME from category Limit $page1,10")or die ("query 1 incorrect.....");

while(list($category_id,$category_name)=mysqli_fetch_array($result))
{
echo "<form action={$_SERVER['PHP_SELF']} method='POST'><tr>
<td>$category_id</td>
<td>$category_name</td>

<td>

<button type='submit' name='deleteCategory' class='btn btn-success' value='{$category_id}'>Delete</button>
</td></tr></form>";
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

$paging=mysqli_query($con,"select CATEGORY_ID, CATEGORY_NAME from category");
$count=mysqli_num_rows($paging);

$a=$count/10;
$a=ceil($a);

for($b=1; $b<=$a;$b++)
{
?> 
<li class="page-item"><a class="page-link" href="categorylist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
<?php	
}
?>
</ul>
</nav>



</div>


</div>
</div>
