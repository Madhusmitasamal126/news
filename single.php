<?php
include 'header.php';
?>
<?php
$post_id=$_GET['id'];
$sql="SELECT post.post_id,post.post_title,post.post_description_text,post.post_date,post.post_author,post.post_category,post.post_img,category.cat_name,users.username FROM post
LEFT JOIN category ON post.post_category=category.cat_id
LEFT JOIN users ON post.post_author=users.user_id
WHERE post.post_id=$post_id";
 $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)){
          while($row=mysqli_fetch_assoc($result)){
?>
<h1 class="text-center my-4"> <?php echo $row['post_title']?></h1>
<div class="text-center mb-4">
    <small>
            <i class="fa fa-list"></i> <a href="category.php?cid=<?php echo $row['post_category']?>"><?php echo ucfirst($row['cat_name'])?></a>
              <i class="fa fa-user"></i> <a href="author.php?aid=<?php echo $row['post_author']?>"><?php echo ucfirst($row['username'])?></a> 
               <i class="fa fa-table"></i> <?php echo $row['post_date']?>
   </small>
</div>
 
          <img src="admin/upload/<?php echo $row['post_img']?>" alt="" style="max-width:600px; width:100%; display:flex; margin:0 auto">
          <p class="mt-4"><?php echo $row['post_description_text']?></p>
          <?php
          }
        }
          ?>
<?php
include 'footer.php';
?>