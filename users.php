<?php
include 'config.php';
?>
<?php
include 'header.php';
?>
<?php
// if($_SESSION['user_role']==0){
//      header("Location:$hostname/admin/post.php");
//  }
?>
<h1>all user</h1>
<a href="add_user.php" class="btn btn-primary mb-2">Add user</a>
<?php
$limit=3;
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $offset=($page-1)*$limit;
    $sql="SELECT * FROM users ORDER BY user_id ASC LIMIT $offset,$limit";
       $result=mysqli_query($con,$sql) or die("Query Failed");
      if(mysqli_num_rows($result)>0){
?>

  <table class="table table-border">
        
<thead>
    <tr>
        <th>sl no.</th>
        <th>full name</th>
        <th>Username</th>
        <th>role</th>
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
        <td><?php echo $row['fname']." ".$row['lname'];?></td>
        <td><?php echo $row['username'];?></td>
        <td><?php if($row['role'] ==1 ){
            echo "Admin";
        }else{
            echo "Normal";
        } ?></td>
        <td><a href="update_user.php?id=<?php echo $row['user_id']?>"><i class="fa fa-edit" ></i></a></td>
        
        <td><a href="delete_user.php?id=<?php echo $row['user_id']?>" onclick="return confirm('Delete this record ?')"><i class="fa fa-trash" ></i></a></td>
    </tr>
    <?php
    $serial++;
    };
    ?>
    
</tbody>
    </table>
    <?php
    }else{
        echo "<p>Data are not available</p>";
      };
      $sql1="SELECT * FROM users";
      $result1=mysqli_query($con,$sql1);
      if(mysqli_num_rows($result1)>0){
        $total_records=mysqli_num_rows($result1);
        $total_page=ceil($total_records/$limit);
        echo '<ul class="pagination admin-pagination">';
        if($page>1){
            echo '<li><a class="page-link" href="users.php?page='.($page-1).'">Prev</a></li>';
        }
        for($i=1;$i<=$total_page;$i++){
            if($i==$page){
                $active="active";
            }else{
                $active="";
            }
            echo '<li class="'.$active.'"><a class="page-link" href="users.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($total_page>$page){
            echo '<li><a class="page-link" href="users.php?page='.($page+1).'">Next</a></li>';
        }
        echo '</ul>';
      }
    ?>
<?php
include 'footer.php';
?>