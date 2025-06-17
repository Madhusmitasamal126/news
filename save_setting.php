<?php
// include 'header.php';
?>
  <?php
   session_start();
include 'config.php';
?>
<?php
// echo'<pre>';
// print_r($_FILES);
if($_FILES['logo']['error']==4){

    $new_name=$_POST['old_logo'];
}else{
    

    $error=array();
    $file_name=$_FILES['logo']['name'];

    $file_size=$_FILES['logo']['size'];
    $file_tmp=$_FILES['logo']['tmp_name'];
    $file_type=$_FILES['logo']['type'];
    $name=explode('.',$file_name);
    $file_ext=end($name);

    //  echo "<pre>";
    // print_r($file_ext);
    // echo "</pre>";

    $extention=array("jpeg","jpg","png");
    if(in_array($file_ext,$extention)===false){
        $error[]="This extention file nat allowed, choose please a jpg or png file";
    }
    if($file_size > 2097152){
        $array[]="File size must be 2MB or lower";

    }
    $new_name=time()."-".basename($file_name);

    //  echo "<pre>";
    // print_r($new_name);
    // echo "</pre>";

    $target="../image/".$new_name;
    
    if(empty($error)==true){
        move_uploaded_file($file_tmp,$target);
    }else{
        print_r($error);
        die();
    }
}
$img_name=$new_name;
   
    $website_name=$_POST['website_name'];
    $footer_des=$_POST['footer_desc'];
    
   

    $sql="UPDATE setting SET website_name='$website_name',footer_desc='$footer_des',logo='$img_name'";
   
    if(mysqli_query($con,$sql)){
        header("Location:$hostname/admin/setting.php");
    }
// mysqli_query($con,$sql);

?>