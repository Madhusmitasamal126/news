<?php
include 'header.php';
?>
<?php
include 'config.php';
?>
<?php
// if($_SESSION['user_role']==0){
//      header("Location:$hostname/admin/post.php");
// }
?>
 <nav class="navbar bg-body-tertiary mt-3">
  <div class="container-fluid">
    <h1>All Categories</h1>
    <!-- <button class="btn btn-outline-success" type="submit">Add Category</button> -->
  
    <a href="add_category.php" class="btn btn-primary mb-2">Add category</a>
  </div>
</nav>
<?php
   $sql="SELECT * FROM category ORDER BY cat_id ASC";
       $result=mysqli_query($con,$sql) or die("Query Failed");
      if(mysqli_num_rows($result) > 0){
        ?>
 <table class="table table-border">
        
<thead>
    <tr>
         <th scope="col">S.l no.</th>
         <th scope="col">Category Name</th>
         <th scope="col">No of posts</th>
         <th scope="col">Edit</th>
         <th scope="col">Delete</th>
     </tr>
</thead>
<tbody>
    <?php
     $serial=1;
     while($row=mysqli_fetch_assoc($result)){
     ?>
    <tr>
        <td><?php echo $serial++;?></td>
        <td><?php echo $row['cat_name'];?></td>
        <td><?php echo $row['post'];?></td>
        
        <td><a href="update_category.php?id=<?php echo $row['cat_id']?>"><i class="fa fa-edit" ></i></a></td>
        
        <td><a href="delete_category.php?id=<?php echo $row['cat_id']?>" onclick="return confirm('Delete this record ?') "><i class="fa fa-trash"></i></a></td>
    </tr>
    <?php
    
     };
    ?>
    
</tbody>
    </table>
    <?php
    }else{
        echo "<p>Data are not available</p>";
      };
      
       
    ?>
<?php
include 'footer.php';
?>