 <?php
 include 'header.php';
 ?>
 <?php
 include 'config.php';
 ?>
 <?php
 if($_SESSION['user_role'] == 0){
    header("Location:$hostname/admin/post.php");
}else{
$cate_id=$_GET['id'];
$sql="DELETE FROM category WHERE cat_id='$cate_id'";

mysqli_query($con,$sql);

header("Location:$hostname/admin/category.php");

// $row=mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($row);
// echo "</pre>";
}
 ?> 
 
 