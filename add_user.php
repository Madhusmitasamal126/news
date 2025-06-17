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
<form action="<?php $_SERVER['PHP_SELF'];
?>" method="POST" autocomplete="off" class="container">
<div class="mb-2">
<input type="text" name="fname" class="form-control" placeholder="First name" required>
</div>
<div class="mb-2">
<input type="text" name="lname" class="form-control" placeholder="last name" required>
</div>
<div class="mb-2">
<input type="text" name="username" class="form-control" placeholder="user name" required>
</div>
<div class="mb-2">
<input type="password" name="password" class="form-control" placeholder="Password" required>
</div>
<div class="mb-2">
    <select name="role">
    <option value="0">Normal user</option>
    <option value="1">Admin</option>
   
 </select>

</div>
<input type="submit" name="save" value="save" class="btn btn-success">

 </form>
   <?php
include 'footer.php';
?>
   