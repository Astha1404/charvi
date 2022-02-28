<?php
session_start();
include("db.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$category_id=$_GET['category_id'];

mysqli_query($con,"delete from category where CATEGORY_ID='$category_id'")or die("query is incorrect...");
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
echo "<tr>
<td>$category_id</td>
<td>$category_name</td>

<td>

<a class=' btn btn-success' href='clothes_list.php?CATEGORY_ID=$category_id&action=delete'>Delete</a>
</td></tr>";
}

?>
</tbody>
</table>
<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
</div>
</div>
<nav aria-label="Page navigation example">
<ul class="pagination">
<li class="page-item">
<a class="page-link" href="#" aria-label="Previous">
<span aria-hidden="true">&laquo;</span>
<span class="sr-only">Previous</span>
</a>
</li>
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
<li class="page-item">
<a class="page-link" href="#" aria-label="Next">
<span aria-hidden="true">&raquo;</span>
<span class="sr-only">Next</span>
</a>
</li>
</ul>
</nav>



</div>


</div>
</div>
<?php
include "footer.php";
?>     