<?php
include 'header.php';
?>
<?php
include 'config.php';
?>
<?php
// if($_SESSION['user_role']==0){
//     header("Location:$hostname/admin/post.php");
// }
?>
<h1>Add new category.</h1>
<?php
if(isset($_POST['save'])){
echo "<pre>";
print_r($_POST);
// die;
echo "</pre>";
// $fname=mysqli_real_escape_string($_POST['fname']);

$category=$_POST['category'];


    $sql1="INSERT INTO category (cat_name) VALUES ('$category')";
    if(mysqli_query($con,$sql1)){
       header("Location:$hostname/admin/category.php"); 
    }
    else{
        echo "<p style='color:red; text-align:center; margin:10px 0;'>Can't insert user.</p>";
    }

}
?>

<form action="<?php $_SERVER['PHP_SELF'];
?>" method="POST" autocomplete="off" class="container">
<div class="mb-2">
    <label for="">Category Name:</label>
<input type="text" name="category" class="form-control"  placeholder="category name" required>
</div>

<input type="submit" name="save" value="save" class="btn btn-success">
</form>
<?php
include 'footer.php';
?>