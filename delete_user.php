 <?php
 include 'config.php';
 ?>
 <?php
 if($_SESSION['user_role'] == 0){
    header("Location:$hostname/admin/post.php");
}else{
$user_id=$_GET['id'];
$sql="DELETE FROM users WHERE user_id='$user_id'";

mysqli_query($con,$sql);

header("Location:$hostname/admin/users.php");

// $row=mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($row);
// echo "</pre>";
}
 ?> 
 
 