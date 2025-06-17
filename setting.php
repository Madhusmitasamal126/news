<?php
include 'config.php';

?>

<?php
include 'header.php';
if($_SESSION['user_role'] == 0){
    header("Location:$hostname/admin/post.php");
}
?>
<h1>UPDATE SETTING PAGE</h1>
<?php
$sql="SELECT * FROM setting";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0){
     while($row=mysqli_fetch_assoc($result)){
?>
<form action="save_setting.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="mb-2">
            <label for="">Website Name</label>
            <input type="text" name="website_name" class="form-control" value="<?php echo $row['website_name'] ?>" required>
        </div>
        <div class="mb-2">
            <label for="">Footer Description</label>
            <textarea name="footer_desc" class="form-control"  rows="6"><?php echo $row['footer_desc'] ?></textarea>
        </div>
        
        <div class="mb-2">
            <label for="">Website Logo</label>
            <input type="file" name="logo" class="form-control">
            <img src="../image/<?php echo $row['logo']?>" height="150px" alt="">
            <input type="hidden" name="old_logo" value="<?php echo $row['logo']?>" id="">
        </div>
        
        <input type="submit" name="save" value="save" class="btn btn-success">
        
    </form>
    <?php
     }
    }
    ?>
<?php
include 'footer.php';
?>