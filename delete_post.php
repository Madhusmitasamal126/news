 <?php
 include 'config.php';
 ?>
 <?php
 
$post_id=$_GET['id'];
$cat_id=$_GET['cate_id'];
$sql="SELECT * FROM post WHERE post_id=$post_id";
$result=mysqli_query($con,$sql) or die("query failed:select");
$row=mysqli_fetch_assoc($result);
unlink("upload/".$row['post_img']);
$sql1="DELETE FROM post WHERE post_id=$post_id;";
$sql .="UPDATE category SET post=post-1 WHERE cat_id=$cat_id;";
mysqli_multi_query($con,$sql1);


header("Location:$hostname/admin/post.php");

// $row=mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($row);
// echo "</pre>";

 ?> 
 
 