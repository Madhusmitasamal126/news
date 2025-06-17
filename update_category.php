   <?php
   include 'header.php';
  ?>
    <?php
   include 'config.php';
   ?>
   <?php
    if($_SESSION['user_role']==0){
    header("Location:$hostname/admin/post.php");
     }
   ?>
   <h1>Update category data.</h1>
  <?php
    $cate_id=$_GET['id'];
    if($_SERVER['REQUEST_METHOD']=="POST"){
      echo "<pre>";
     print_r($row);
    echo "</pre>";

    // $fname=mysqli_real_escape_string($_POST['fname']);
$cat=$_POST['category'];

// $userid=$_POST['user_id'];

$sql1="UPDATE category SET cat_name='$cat' WHERE cat_id=$cate_id" ;
$result1=mysqli_query($con,$sql1);
header("Location:$hostname/admin/category.php");
    }
    ?>
   <?php
  
    

// echo $user_id;
$sql="SELECT * FROM category WHERE cat_id=$cate_id";

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($row);
// echo "</pre>";

    ?>
   
<form action="<?php $_SERVER['PHP_SELF'];
?>" method="POST" autocomplete="off" class="container">
<div class="mb-2">
<input type="text" name="category" class="form-control" value="<?php echo $row['cat_name'];?>" placeholder="category name" required>
</div>

<input type="submit" name="save" value="save" class="btn btn-success">

 </form>
   <?php
   include 'footer.php';
   ?>