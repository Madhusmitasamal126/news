<?php
include 'config.php';
?>
<?php
if(isset($_POST['login'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        echo "<div class='alert alert-danger'>All fields must be entered.</div>";
        die();
    }
    else{
        $username=$_POST['username'];
        $password=md5($_POST['password']);
            $sql="SELECT user_id,username,role FROM users WHERE username='$username' AND password='$password'";
           $result=mysqli_query($con,$sql) or die("query failed");
           if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                 session_start();
                $_SESSION['username']=$row['username'];
                $_SESSION['user_id']=$row['user_id'];
                $_SESSION['user_role']=$row['role'];
                header("Location:$hostname/admin/post.php");
            }
            }else{
                echo "<div class='alert alert-danger'>username and password are not matched.</div>";
            }

        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="container">
    <h1 >welcome to news admin</h1>
<form action="<?php $_SERVER['PHP_SELF'];
?>" method="POST" autocomplete="off" class="container">
<div class="mb-2">
    <label for="user name">User name:</label>
<input type="text" name="username" class="form-control"  >
</div>
<div class="mb-2">
    <label for="">Password</label>
<input type="password" name="password" class="form-control">
</div>

<input type="submit" name="login" value="login" class="btn btn-primary">

 </form>
</body>
</html>


   