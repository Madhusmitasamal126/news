<?php
$hostname="http://localhost/news";
$con=mysqli_connect("localhost","root","","news");
if($con==false){
    echo ("connection faild.".mysqli_connect_error());
}
?>