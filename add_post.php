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
<h1>Add post page.</h1>
<?php
if(isset($_POST['save'])){
echo "<pre>";
print_r($_POST);
// die;
echo "</pre>";
// $fname=mysqli_real_escape_string($_POST['fname']);
$fname=mysqli_real_escape_string($con,$_POST['fname']);
$lname=mysqli_real_escape_string($con,$_POST['lname']);
$username=trim($_POST['username']);
$password=md5($_POST['password']);
$role=$_POST['role'];

$sql="SELECT username FROM users WHERE username='$username'";
$result=mysqli_query($con,$sql) or die("query failed");
if(mysqli_num_rows($result)>0){
    echo "<p style='color:red; text-align:center; margin:10px 0;'>user already exit.</p>";
}
else{
    $sql1="INSERT INTO users(fname,lname,username,password,role) VALUES ('$fname','$lname','$username','$password',$role)";
    if(mysqli_query($con,$sql1)){
       header("Location:$hostname/admin/users.php"); 
    }
    else{
        echo "<p style='color:red; text-align:center; margin:10px 0;'>Can't insert user.</p>";
    }
}
}
?>
<form action="save_post.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="container">
<div class="mb-2">
    <label for="">Title:</label>
<input type="text" name="title" class="form-control" required>
</div>
<div class="mb-2">
    <label for="">Description:</label>
<textarea name="description" class="form-control"  rows="10" ></textarea>
</div>
<div class="mb-2">
    <label for="">category:</label>
    <select name="category">
    <option  disabled selected>select category</option>
    <?php
    $sql1="SELECT * FROM category";
    $result1=mysqli_query($con,$sql1);
    if(mysqli_num_rows($result1)>0){
        while($row1=mysqli_fetch_assoc($result1)){
            echo '<option value="'.$row1['cat_id'].'">'.$row1['cat_name'].'</option>';
        }
    }
    ?>
    </select>
</div>
<div class="mb-2">
    <label for="">Post image:</label>
<input type="file" name="img" class="form-control" required>
</div>
<input type="submit" name="save" value="save" class="btn btn-success">

 </form>
   <?php
include 'footer.php';
?>
   