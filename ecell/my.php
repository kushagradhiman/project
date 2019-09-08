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
    

     
    
    
    <div class="body">
       
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
</ul></div>
<div style="width: 100%;
height:100vh;">
            <div class="boxm testimonial">
                <div class="container" align="center" style="color: whitesmoke;">
                    <h1>enter username</h1>
                    <br>
                    <form action="my.php" method="post">
                   <?php if (isset($_POST['name'])) 
 {
   ?>
                        <input type="text" name="name" value="<?= $_POST['name']?>"required>
 <?php } else { ?>
    <input type="text" name="name" placeholder="username"required>
 <?php }?>
                        <input class="registern" type="submit" placeholder="Register Now">
                    </form>
                </div>
            </div>
        </div>

                <?php
    $servername = "localhost";
    $username = "user";
    $password = "password";
    $conn = new mysqli($servername, $username, $password, 'users');
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_POST['name'])) 
 {
   
        $username = mysqli_real_escape_string($conn, $_POST['name']);
        
        $sql2 = "SELECT event FROM userdata WHERE username  = '$username'";
        $numa = mysqli_query($conn , $sql2);
        $num2 = mysqli_fetch_assoc($numa);
        for ($i = 0; $i <strlen($num2['event']);$i+=3 )
        { 
            $eventno = $num2['event'][$i] . $num2['event'][$i+1] . $num2['event'][$i+2];
            $sql = "SELECT * FROM events WHERE id = '$eventno';";
            $result = mysqli_query($conn, $sql);
            ?>
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
                    

                </div>
                </div>
            
        
            
                         <br><br><br>
                        <?php }}}?>

</div>

</body>

</html>
