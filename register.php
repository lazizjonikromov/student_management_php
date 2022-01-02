<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolproject";

    $data = mysqli_connect($host, $user, $password, $db);

    if(isset($_POST['submit'])){
        $username = $_POST['name'];
        $user_email = $_POST['email'];
        $user_phone = $_POST['phone'];
        $user_password = $_POST['password'];
        $usertype = "student";

        $check = "select * from user where username = '$username'";
        $check_user = mysqli_query($data,$check);
        $row_count=mysqli_num_rows($check_user);
        
        if($row_count==1){
                echo "<script type='text/javascript'> 
                    alert('Username Already Exist. Try Another One'); 
                </script>";
        }
        else
        {
            $sql = "insert into user(username,email,phone,usertype,password) values('$username','$user_email', '$user_phone','$usertype','$user_password')";

            $result=mysqli_query($data,$sql);
            if($result){
                echo "<script type='text/javascript'> alert('Data Uploaded Success'); </script>";
                header("location:login.php");
            }
            else{
                echo "Upload Failed";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body background="school2.jpg" class="body_deg">
    <center>
        <div class="form_reg" style="padding-top: 100px;">

            <center class="title_deg">
                Register Form

            </center>

            <form class="login_form" action="#" method="post">
                <div>
                    <label class="label_deg" for="">Username</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label class="label_deg" for="">Email</label>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label class="label_deg" for="">Phone</label>
                    <input type="number" name="phone" required>
                </div>
                <div>
                    <label class="label_deg" for="">Password</label>
                    <input type="text" name="password" required>
                </div>
                <div style="display: flex;justify-content:space-around;align-items:center;margin-top:20px;">
                    <p><a href="login.php" style="color: skyblue;">Already Registered ?</a></p>
                    <input class="btn btn-primary" type="submit" name="submit" value="Register">
                </div>
            </form>
        </div>
    </center>
</body>
</html>