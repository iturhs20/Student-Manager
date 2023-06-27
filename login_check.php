<?php

error_reporting(0);
session_start();


$host='127.0.0.1:3307';

$user='root';

$password='';

$db='schoolproject';

$data = mysqli_connect($host,$user,$password,$db);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST['username'];
    $pass = $_POST['password'];
    

    $sql="select * from user where username = '".$name."' AND password = '".$pass."' ";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="student")
    {
        
        $_SESSION['username']=$name;
        $_SESSION['usertype']="student";
        header("location:studenthome.php");
    }

    else if($row["usertype"]=="admin")
    {
        $_SESSION['username']=$name;
        $_SESSION['usertype']="admin";
        header("location:adminhome.php");
    }

    else
    {
        $message = "username and password does not match";

        $_SESSION['loginMessage']=$message;
        $_SESSION['usertype']="admin";

        header("location:login.php");
    }

}


?>