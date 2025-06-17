   <?php
   include 'header.php';
   if($_SESSION['user_role']==0){
    header("Location:$hostname/admin/post.php");
}
   ?>
   <h1>Update user data.</h1>
   <?php
   include 'config.php';
   ?>
    <?php
    $user_id=$_GET['id'];
    if($_SERVER['REQUEST_METHOD']=="POST"){
      echo "<pre>";
     print_r($row);
    echo "</pre>";

    // $fname=mysqli_real_escape_string($_POST['fname']);
$fname=mysqli_real_escape_string($con,$_POST['fname']);
$lname=mysqli_real_escape_string($con,$_POST['lname']);
$username=trim($_POST['username']);

$role=$_POST['role'];
// $userid=$_POST['user_id'];

$sql1="UPDATE users SET fname='$fname',lname='$lname',username='$username',role=$role WHERE user_id=$user_id" ;
$result1=mysqli_query($con,$sql1);
header("Location:$hostname/admin/users.php");
    }
    ?>
   <?php
  
    

// echo $user_id;
$sql="SELECT * FROM users WHERE user_id=$user_id";

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($row);
// echo "</pre>";

    ?>
   
<form action="<?php $_SERVER['PHP_SELF'];
?>" method="POST" autocomplete="off" class="container">
<div class="mb-2">
<input type="text" name="fname" class="form-control" value="<?php echo $row['fname'];?>" placeholder="First name" required>
</div>
<div class="mb-2">
<input type="text" name="lname" class="form-control" value="<?php echo $row['lname'];?>" placeholder="last name" required>
</div>
<div class="mb-2">
<input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>" placeholder="user name" required>
</div>

<div class="mb-2">
   <select name="role">
    <?php
    if($row['role']==1){
      echo "<option value='0' >Normal user</option>
      <option value='1' selected>Admin</option>
      ";
    }else{
       echo "<option value='0' selected>Normal user</option>
      <option value='1' >Admin</option>
      ";
    }
  ?>
  
</select>

</div>
<input type="submit" name="save" value="save" class="btn btn-success">

 </form>
   <?php
   include 'footer.php';
   ?>