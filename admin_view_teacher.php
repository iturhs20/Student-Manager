<?php

error_reporting(0);

session_start();
   if(!isset($_SESSION['username'])){
    header("location:login.php");
   }
   else if($_SESSION['usertype']=='student'){
    header("location:login.php");
   }

   $host='127.0.0.1:3307';

   $user='root';

   $password='';

   $db='schoolproject';

   $data = mysqli_connect($host,$user,$password,$db);

   $sql="SELECT * FROM teacher";

   $result=mysqli_query($data,$sql);

   if($_GET['teacher_id'])
   {
    $t_id=$_GET['teacher_id'];
    $sql2="DELETE FROM teacher WHERE id='$t_id'";
    $result2=mysqli_query($data,$sql2);

    if($result)
    {
        header('location:admin_view_teacher.php');
    }
   }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <?php 
       include 'admin_css.php';
    ?>

    <style type="text/css">
        .table_th
        {
            padding: 15px;
            font-size: 20px;
        }
        .table_td
        {
            padding: 15px;
        }
    </style>

</head>
<body>

    <?php
       include 'admin_sidebar.php';
    ?>

    <div class="content">
        <center>
        <h1 style="padding-top:20px;" >
            View Teacher
        </h1>
        <br>

        <table border="1px">
            <tr>
                <th class="table_th">Teacher name</th>
                <th class="table_th">About Teacher</th>
                <th class="table_th">Image</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>
            
            <?php 
                while($info=$result->fetch_assoc()){
            ?>

            <tr>
                <td class="table_td"><?php echo "{$info['name']}" ?></td>
                <td class="table_td"><?php echo "{$info['description']}" ?></td>
                <td class="table_td"><img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>"</td>
                <td class="table_td"><?php echo " <a onClick=\"javascript:return confirm('Are you sure?');\" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'>Delete</a>"; ?></td>
                <td class="table_td"><?php echo "<a class='btn btn-primary' href='admin_update_teacher.php?teacher_id={$info['id']}'>Update</a>"; ?></td>
            </tr>

            <?php } ?>
        </table>
        </center>
    </div>
    
</body>
</html>