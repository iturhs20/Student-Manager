<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body background="school2.jpg" class="body_deg">
    <nav>
    <a href="index.php">
        <button class="home">
            Home
        </button>
    </a>
    </nav>
    <div class="form_deg" style="text-align: center">
        <div class="title_deg">
                Login Form

                <h4> 
                    <?php
                    error_reporting(0);
                    session_start();
                    session_destroy();

                    echo $_SESSION['loginMessage'];
                    ?>
                </h4>

        </div>
        <form action="login_check.php" method="POST" class="login_form">
            <div>
                <label class="label_deg">Username</label>
                <input type="text" name="username">
            </div>

            <div>
                <label class="label_deg">Password</label>
                <input type="Password" name="password">
            </div>

            <div>
                <input class="btn btn-warning" type="Submit" name="submit" value="Login">
            </div>
        </form>
    </div>    
</body>
</html>