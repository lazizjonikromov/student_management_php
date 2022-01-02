<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='admin'){
        header("location:login.php");
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolproject";

    $data = mysqli_connect($host, $user, $password, $db);

    $name=$_SESSION['username'];

    $sql = "select * from user where username='$name' ";

    $result = mysqli_query($data, $sql);

    $info = mysqli_fetch_assoc($result);

    if(isset($_POST['update_profile']))
    {
        $s_email = $_POST['email'];
        $s_phone = $_POST['phone'];
        $s_password = $_POST['password'];

        $sql = "update user set email='$s_email', phone='$s_phone', password='$s_password' 
        where username='$name' ";

        $result2 = mysqli_query($data, $sql);

        if($result2){
            header("location:student_profile.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <?php
        include 'student_css.php'
    ?>
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding: 70px 0;
        }
    </style>
</head>
<body>
    <?php
        include 'student_sidebar.php'
    ?>
    
    <div class="content">
        <center>
            <h1>Update Profile</h1>
            <br>
            <form action="#" method="post">
                <div class="div_deg">
                    <div>
                        <label for="">Email</label>
                        <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>">
                    </div>
                    <div>
                        <label for="">Phone</label>
                        <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>">
                    </div>
                    <div>
                        <label for="">Password</label>
                        <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>">
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" name="update_profile" value="Update">
                    </div>    
                </div>
            </form>
        </center>
    </div>
</body>
</html>