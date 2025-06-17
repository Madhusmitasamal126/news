
<?php
session_start();
include 'config.php';
?>
<?php
if(isset($_FILES['img'])){
    // print_r($_FILES['img']);
    $error=array();
    $file_name=$_FILES['img']['name'];
    $file_size=$_FILES['img']['size'];
    $file_tmp=$_FILES['img']['tmp_name'];
    $file_type=$_FILES['img']['type'];
    $name=explode('.',$file_name);
    $file_ext=end($name);
    $extension=array("jpeg","jpg","png");
    if(in_array($file_ext,$extension)===false){
        $error[]="This extension file not allow please choose a jpeg or png file.";
    }
    if($file_size>2097152){
        $array[]="Files size must be 2MB or lower.";
    }
    $new_name=time()."-".basename($file_name);
    $target="upload/".$new_name;
    if(empty($error)==true){
     move_uploaded_file($file_tmp,$target);
    }else{
        print_r($error);
        die();
    }
   
   $title=$_POST['title'];

   $description=$_POST['description'];
   $category=$_POST['category'];
   $date=date('d M,Y');
   $author=$_SESSION['user_id'];
//    echo "<pre>";
//    print_r($new_name);
// echo "</pre>";
   $sql="INSERT INTO post(post_title,post_description_text,post_category,post_date,post_author,post_img)VALUES('$title','$description',$category,'$date',$author,'$new_name');";
   $sql .="UPDATE category SET post=post+1 WHERE cat_id=$category";
   if(mysqli_multi_query($con,$sql)){
    header("Location:$hostname/admin/post.php");
   }
   
}
?>