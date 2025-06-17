<?php
include 'config.php';
?>
<?php
include 'header.php';
?>

<?php
if(isset($_GET['search'])){
    $search_term=$_GET['search'];

?>
<h1 class="text-center my-4">Search: <?php echo $search_term ?></h1>
<div class="post-containt my-4">
    <div class="row g-2">
       <?php
       include 'side_bar.php';
       ?>
        <div class="col-md-8">
            <div class="news bg-light p-2">

    <?php
     
    $limit=2;
  if(isset($_GET['page'])){
      $page=$_GET['page'];

}else{
    $page=1;
}
$offset=($page-1) * $limit;
$sql="SELECT post.post_id,post.post_title,post.post_description_text,post.post_date,post.post_author,post.post_category,post.post_img,category.cat_name,users.username FROM post
LEFT JOIN category ON post.post_category=category.cat_id
LEFT JOIN users ON post.post_author=users.user_id
WHERE post.post_title LIKE '%{$search_term}%' OR  post.post_description_text LIKE '%{$search_term}%'
ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
 $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)){
          while($row=mysqli_fetch_assoc($result)){
              ?>

              <!-- card start -->
              <div class="card mb-3">
  <div class="row g-0 p-2">
    <div class="col-md-4">
     <a href="single.php?id=<?php echo $row['post_id']?>"> <img src="admin/upload/<?php echo $row['post_img']?>" class="img-fluid rounded-start" alt="..."> </a>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"> <a href="single.php?id=<?php echo $row['post_id']?>"> <?php echo $row['post_title']?></a></h5>
        <small>
            <i class="fa fa-list"></i> <a href="category.php?cid=<?php echo $row['post_category']?>"><?php echo ucfirst($row['cat_name'])?></a>  
            <i class="fa fa-user"></i><a href="author.php?aid=<?php echo $row['post_author']?>"><?php echo ucfirst($row['username'])?></a>
             <i class="fa fa-table"></i> <?php echo $row['post_date']?>
          </small>

        <p class="card-text"><?php echo substr($row['post_description_text'],0,130)."..."; ?></p>
        <a href="single.php?id=<?php echo $row['post_id']?>" class="btn btn-primary btn-sm mt-3 float-end">Read More</a>
      </div>
    </div>
  </div>
</div>
<!-- card end -->
   <?php
        }
      }
   ?>
<?php
$sql1="SELECT * FROM post WHERE post.post_title LIKE '%{$search_term}%' OR  post.post_description_text LIKE '%{$search_term}%'";
 $result1=mysqli_query($con,$sql1);
    if(mysqli_num_rows($result1) > 0){
        $total_records=mysqli_num_rows($result1);
        $total_page=ceil($total_records/$limit);
        echo '<ul class="pagination admin-pagination">';
        if($page>1){
            echo '<li class="page-item" ><a class="page-link"  href="search.php?search='.$search_term.'&page='.($page-1).'">Prev</a></li>';
        }
        for($i=1;$i<=$total_page;$i++){
            if($i==$page){
                $active="active";
            }else{
                $active="";
            }
            echo '<li class="page-item'.$active.'"><a class="page-link" href="search.php?search='.$search_term.'&page='.$i.'">'.$i.'</a></li>';

        }
        if($total_page>$page){
            echo '<li class="page-item" ><a class="page-link" href="search.php?search='.$search_term.'&page='.($page+1).'">next</a></li>';
        }
        echo '</ul>';
    }else{
        echo "<p class='text-center text text-danger'>No search result found</p>";
    }
?>
            </div>
            
        </div>
<?php
}
?>

    </div>


</div>

<?php

include 'footer.php';
?>