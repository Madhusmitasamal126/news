
<?php
session_start();
include 'config.php';
?>
<?php
if(($_FILES['new_img']['error'])==4){
    $new_name=$_POST['old_img'];
}else{
    // print_r($_FILES['img']);
    $error=array();
    $file_name=$_FILES['new_img']['name'];
    $file_size=$_FILES['new_img']['size'];
    $file_tmp=$_FILES['new_img']['tmp_name'];
    $file_type=$_FILES['new_img']['type'];
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
}
 $image_name=$new_name;
   $title=$_POST['title'];

   $description=$_POST['description'];
   $category=$_POST['category'];
   $old_category=$_post['old_category'];
   $post_id=$_POST['post_id'];

//    echo "<pre>";
//    print_r($new_name);
// echo "</pre>";
   $sql="UPDATE post SET post_title='$title',post_description_text='$description',post_category='$category',post_img='$image_name' WHERE post_id=$post_id;";
   if($old_category!=$category){
    $sql .="UPDATE category SET post=post-1 WHERE cat_id=$old_category;";
     $sql .="UPDATE category SET post=post+1 WHERE cat_id=$category;";
   }
  
   if(mysqli_multi_query($con,$sql)){
    header("Location:$hostname/admin/post.php");
   }
   

?>