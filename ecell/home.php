<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="home.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    session_start();
    $servername = "localhost";
    $username = "user";
    $password = "password";
    $conn = new mysqli($servername, $username, $password, 'users');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    $username = "";
    $email    = "";
    $num = "";
    $errors = array();
    $errorc = 0;
    
 if (isset($_POST['name'])) 
 {
   
        $username = mysqli_real_escape_string($conn, $_POST['name']);
        $num1 = mysqli_real_escape_string($conn, $_POST['num']);
        $sql2 = "SELECT event FROM userdata WHERE username  = '$username'";
        $numa = mysqli_query($conn , $sql2);
        $num2 = mysqli_fetch_assoc($numa);
        $num = $num1 . $num2['event'] ;
            $query = "UPDATE userdata
            SET event = '$num'
            WHERE username = '$username';";
            mysqli_query($conn, $query);
 }

$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql);

    ?>
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
    <div class="carousalphoto">
    </div>
    <div class="carousalback">
    </div>
    <div id="point">
        <div class="abouthead">
        <h3 style="padding-top: 10px;">Events</h3>
        </div>
        <div style="width: 100%;overflow:hidden;">
        </div>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
         ?>
         
            <div style="width: 100%;">
                <div class="box testimonial">
                    <img class="event-img" src="<?= $row["img"] ?>" />
                    <div class="event-head">
                        <h3><?= $row["name"] ?></h3>
                    </div>
                    <br><br><br>
                    <div class="event-bod">
                        <?= $row["details"] ?>
                    </div>
                    <div class="gap"></div>
                    <div class="gap"></div>
                    <div class="gap"></div>
                    <div class="gap"></div>
                    <div class="gap"></div>
                    <div class="gap"></div>
                    <div class="gap"></div>
                    <div class="gap"></div>
                    <div class="gap"></div>
                    <div class="gap"></div>
                    <div class="gap"></div>
                    <div class="gap"></div>
                    <div class="register-cont">
                        
                        <div class="container" align="center" style="color: whitesmoke;">
                           
                            <form action="home.php" method="post">
                                <input type="text" name="name" placeholder="Username.." required>
                                <input type="hidden" name="num" value="<?= $row['id'] ?>" >
                                <br>
                                <input class="registern" type="submit" placeholder="Register Now">
                            </form>
                        </div>
                       
                    </div>

                </div>
                </div>
          
            
                         <br><br><br>
                        <?php }?>

        <br><br><br><br><br><br><br>
    </div>

                        </body>
</html>
