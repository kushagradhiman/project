<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="register.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    session_start();
    $username = "";
    $email    = "";
    $errors = array();
    $errorc = 0;
    $db = mysqli_connect('localhost', 'user', 'password', 'users');
    if (isset($_POST['name'])) {
        $username = mysqli_real_escape_string($db, $_POST['name']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $num = mysqli_real_escape_string($db, $_POST['num']);
        $user_check_query = "SELECT * FROM userdata WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
                echo 'username already exists';
                $errorc +=1;
            }
?>
<br>
<?php
            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            echo 'email already exists';
            $errorc += 1;
            }
        }
        if ($errorc== 0) {


            $query = "INSERT INTO userdata (username, email,number) 
  			  VALUES('$username', '$email', '$num')";
            mysqli_query($db, $query);
        }
    }
    ?>
    <div class="body">
        <div style="width: 100%;
height:100vh;">
            <div class="boxm testimonial">
                <div class="container" align="center" style="color: whitesmoke;">
                    <h1>Registration Form</h1>
                    <br>
                    <form action="register.php" method="post">
                        <input type="text" name="name" placeholder="Your name.." required>
                        <input type="text" name="num" placeholder="Your number.." required>
                        <input type="text" name="email" placeholder="Your email.." required>
                        <br>
                        <input class="registern" type="submit" placeholder="Register Now">
                    </form>
                </div>
            </div>
        </div>
        <div class="nava">

<ul class="nav " style="min-height: 47px;">

    <li class="nav-item">
        <a class="nav-link lia" href="register.php">REGISTER</a>
    </li>
    <li class="nav-item">
        <a class="nav-link lia" href="home.php">EVENTS</a>
    </li>
    <li class="nav-item">
        <a class="nav-link lia" href="my.php">YOUR EVENTS</a>
    </li>
</ul>
</div>
</body>

</html>
