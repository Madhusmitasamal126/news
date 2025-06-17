   <?php
   include 'header.php';
//    if($_SESSION['user_role']==0){
//     header("Location:$hostname/admin/post.php");
// }
   ?>
   <h1>Update post data.</h1>
   <?php
   include 'config.php';
   ?>
    <?php
    $post_id=$_GET['id'];
    // if($_SERVER['REQUEST_METHOD']=="POST"){
    //   echo "<pre>";
    //  print_r($row);
    // echo "</pre>";

    // $fname=mysqli_real_escape_string($_POST['fname']);
// $title=mysqli_real_escape_string($con,$_POST['title']);
// $description=mysqli_real_escape_string($con,$_POST['description']);
// $username=trim($_POST['username']);

// $role=$_POST['role'];
// $userid=$_POST['user_id'];

// $sql1="UPDATE post SET fname='$fname',lname='$lname',username='$username',role=$role WHERE user_id=$user_id" ;
// $result1=mysqli_query($con,$sql1);
// header("Location:$hostname/admin/users.php");
    //  }
    ?>
   <?php
  
    

// echo $user_id;
$sql="SELECT post.post_id,post.post_title,post.post_description_text,post.post_img,category.cat_name,post.post_category FROM post
LEFT JOIN category ON post.post_category=category.cat_id
LEFT JOIN users ON post.post_author=users.user_id 
WHERE post.post_id=$post_id";

$result=mysqli_query($con,$sql);


    while($row=mysqli_fetch_assoc($result)){

// echo "<pre>";
// print_r($row);
// echo "</pre>";

    ?>
   
<form action="save_update_post.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="container">
<div class="mb-2">
<input type="hidden" name="post_id" class="form-control" value="<?php echo $row['post_id'];?>"  required>
</div>

 <div class="mb-2">
    <label for="">Title:</label>
<input type="text" name="title" class="form-control" value="<?php echo $row['post_title'];?>"  required>
</div>
<div class="mb-2">
    <label for="">Description:</label>
<textarea name="description" class="form-control"  rows="10" ><?php echo $row['post_description_text'];?></textarea>
</div>
<div class="mb-2">
    <label for="">category:</label>
    <select name="category">
    <option  disabled >select category</option>
    <?php
    $sql1="SELECT * FROM category";
    $result1=mysqli_query($con,$sql1);
    if(mysqli_num_rows($result1)>0){
        while($row1=mysqli_fetch_assoc($result1)){
            if($row['post_category']==$row1['cat_id']){
                $selected="selected";
            }else{
                $selected="";
            }
            echo '<option value="'.$row1['cat_id'].'" '.$selected.'>'.$row1['cat_name'].'</option>';
        }

    }
    ?>
    </select>
</div>
<div class="mb-2">
  
<input type="hidden" name="old_category" value="<?php echo $row['post_category'];?>" class="form-control" required>
</div>
<div class="mb-2">
    <label for="">Post image:</label>
<input type="file" name="new_img" class="form-control">
<img src="upload/<?php echo $row['post_img'];?>" alt="" height="150px">
<input type="hidden" name="old_img" value="<?php echo $row['post_img'];?>">
</div>
<input type="submit" name="save" value="update" class="btn btn-success">
 </form>
 <?php

    }
?>
   <?php
   include 'footer.php';
   ?>