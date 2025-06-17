<?php
include 'config.php';
?>
<?php
include 'header.php';
?>

<h1>all post.</h1>
<a href="add_post.php" class="btn btn-primary mb-2">Add post</a>
<?php
$limit=3;
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $offset=($page-1)*$limit;
    if($_SESSION['user_role']=='1'){
     $sql="SELECT post.post_id,post.post_title,post.post_description_text,post.post_category,post.post_date,category.cat_name,users.username FROM post 
     LEFT JOIN category ON post.post_category=category.cat_id
     LEFT JOIN users ON post.post_author=users.user_id
     ORDER BY post.post_id DESC LIMIT $offset,$limit";
    }elseif($_SESSION['user_role']=='0'){
     $sql="SELECT post.post_id,post.post_title,post.post_description_text,post.post_category,post.post_date,category.cat_name,users.username FROM post 
     LEFT JOIN category ON post.post_category=category.cat_id
     LEFT JOIN users ON post.post_author=users.user_id 

     ORDER BY post.post_id DESC LIMIT $offset,$limit";
    }
    
       $result=mysqli_query($con,$sql) or die("Query Failed");
      if(mysqli_num_rows($result)>0){
?>

  <table class="table table-border">
        
<thead>
    <tr>
        <th>sl no.</th>
        <th>Title</th>
        <th>Category</th>
        <th>Date</th>
        <th>Author</th>
        <th>Edit</th>
        <th>Delete</th>
     
    </tr>
</thead>
<tbody>
    <?php
    
      
   $serial=$offset+1;
    while($row=mysqli_fetch_assoc($result)){
 
    
    ?>
    <tr>
        <td><?php echo $serial;?></td>
        <td><?php echo $row['post_title'];?></td>
        <td><?php echo $row['cat_name'];?></td>
        <td><?php echo $row['post_date'];?></td>
        <td><?php echo $row['username'];?></td>
        
        <td><a href="update_post.php?id=<?php echo $row['post_id']?>"><i class="fa fa-edit" ></i></a></td>
        
        <td><a href="delete_post.php?id=<?php echo $row['post_id']?>&cate_id=<?php echo $row['post_category']?>" onclick="return confirm('Delete this record ?')"><i class="fa fa-trash" ></i></a></td>
    </tr>
    <?php
    $serial++;
    }
    ?>
    
</tbody>
    </table>
    <?php
    }else{
        echo "<p>Data are not available</p>";
      }
       if($_SESSION['user_role']=='1'){
          $sql1="SELECT * FROM post";
       }else if($_SESSION['user_role']=='0'){
        $uid=$_SESSION['user_id'];
         $sql1="SELECT * FROM post WHERE post_author=$uid";
       }
      
      $result1=mysqli_query($con,$sql1);
      if(mysqli_num_rows($result1)>0){
        $total_records=mysqli_num_rows($result1);
        $total_page=ceil($total_records/$limit);
        echo '<ul class="pagination admin-pagination">';
        if($page>1){
            echo '<li><a class="page-link" href="post.php?page='.($page-1).'">Prev</a></li>';
        }
        for($i=1;$i<=$total_page;$i++){
            if($i==$page){
                $active="active";
            }else{
                $active="";
            }
            echo '<li class="'.$active.'"><a class="page-link" href="post.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($total_page>$page){
            echo '<li><a class="page-link" href="post.php?page='.($page+1).'">Next</a></li>';
        }
        echo '</ul>';
      }
    ?>
<?php
include 'footer.php';
?>