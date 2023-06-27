<?php

error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message'])
{
    $message=$_SESSION['message'];

    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}

$host = '127.0.0.1:3307';
$user = 'root';
$password = '';
$db = 'schoolproject';

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM teacher";

$result = mysqli_query($data, $sql);

$sql1 = "SELECT * FROM course";

$result1 = mysqli_query($data, $sql1);




?>



<!DOCTYPE html>
<html>

<style>
    #head1{text-align:center}
    #head2{text-align:center}
    #head3{text-align:center;padding-top: 30px;}
    #head4{text-align:center;color:white;top:35%;position:relative}
</style>

<head>
    <meta charset="UTF-8">
    <title> Student manager System</title>
    <link rel="stylesheet" type="text/css" href="style.css">

     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <nav>
        <label class="logo">Fr. Conceicao Rodrigues College of Engineering</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php"class="btn btn-info">Login</a></li>
        </ul>
    </nav>
    
    <div class="section1">
        <label class="img_text">Moulding Engineer Who Can Build The Nation</label>
        <img class="main_img" src="school_management.jpg">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="frcrce.png">

            </div>
            <div class="col-md-8">
                <h1>Welcome to Fr. Conceicao Rodrigues College of Engineering</h1>
                <p>
                The college was started in 1984 with a single course of production engineering with an intake capacity of 60 students. 
                In 1987 the course in electronics engineering was started with an intake capacity of 60 students. In 1991, the course in computer 
                engineering was started with an intake capacity of 60 students. In 2001, the course in information technology was started with an 
                intake capacity of 30 students.

                r. Conceicao Rodrigues College of Engineering (CRCE) is affiliated to the University of Mumbai. Directorate of Technical Education, 
                Government of Maharashtra State (DTE) awarded an "A" grade to the college among various engineering colleges. In the social community it 
                is regarded as one of the finest engineering colleges in Mumbai on account of its dedicated & disciplined academic approach, staff, infrastructure,
                 research facilities, a strong alumni network & above all, excellent campus placements
                </p>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php 
               while($info=$result->fetch_assoc())
               {
            
            ?>
            <div class="col-md-4">
                <img class="teacher" src="<?php  echo "{$info['image']}" ?>">
                <h3><?php  echo "{$info['name']}" ?></h3>
                <h5><?php  echo "{$info['description']}" ?></h5>
            </div>

            <?php } ?>
            
        </div>
    </div>

    <h1 id="head2">Our Courses</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="aids.jpeg">
                <h3>Artificial Intelligence And Data Science</h3>
            </div>
            
            <div class="col-md-4">
                <img class="teacher"  src="cs.jpg">
                <h3>Computer Engineering</h3>
            </div>
            
            <div class="col-md-4">
                <img class="teacher" src="ecs.jpg">
                <h3>Electronics And Communication</h3>
            </div>
        </div>
    </div>

    <h1 id="head3">Addmission Form</h1>

    <div class="addmission_form" style="text-align: center">
        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>

            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>

            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>

            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_txt" name="message"></textarea>
            </div>

            <div class="adm_int">
                <input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply">
            </div>

        </form>
    </div>

    <footer>
        <h4 id="head4">All @copyright reserved by Fr Rodrigues College of Engineering</h4>
    </footer>
    
</body>
</html>