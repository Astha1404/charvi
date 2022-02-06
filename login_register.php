<?php

require("concation.php");

#$u_m_id=$_POST["USER_MASTER_ID"];
$uname=$_POST["USERNAME"];
$password=$_POST["PASSWORD"];
$add=$_POST["ADDRESS"];
$email=$_POST["EMAIL"];
$conn=$_POST["CONTACT_NO"];

/*insert the record*/
$sql="INSERT INTO `user_master`VALUES (' ','$uname','$password','$add','$email','$conn','null','null')"; 

$res=mysqli_query($con,$sql);

if($res)    
{
    echo "success";
}
else
{
    echo "failed";
}
?>