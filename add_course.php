<?php

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

   if(isset($_POST['add']))
   {
    $c_name=$_POST['name'];
    $file=$_FILES['image']['name'];

    $dst="./image/".$file;

    $dst_db="image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    $sql="INSERT INTO teacher (name,image) VALUES ('$c_name','$dst_db')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        header('location:add_course.php');
    }

   }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <style type="text/css">
        label
        {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg
        {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }

    </style>

    <?php 
       include 'admin_css.php';
    ?>

</head>
<body>

    <?php
       include 'admin_sidebar.php';
    ?>

    <div class="content">
        <center>
        <h1 style="padding-top:20px;">
            Add Courses
        </h1>


        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Course name</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label>Image</label>
                    <input type="file" name="image">
                </div>
                <div style="text-align: center;">
                    <input type="submit" class="btn btn-primary" name="add" value="Add">
                </div>
            </form>
        </div>
        </center>


    </div>
    
</body>
</html>