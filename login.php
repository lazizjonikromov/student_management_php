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
        <div class="form_deg" style="padding-top: 100px;">

            <center class="title_deg">
                Login Form

                <h4>
                    <?php
                        session_start();
                        error_reporting(0);
                        session_destroy();
                        echo $_SESSION['loginMessage'];
                    ?>
                </h4>
            </center>

            <form class="login_form" action="login_check.php" method="post">
                <div>
                    <label class="label_deg" for="">Username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label class="label_deg" for="">Password</label>
                    <input type="password" name="password">
                </div>
                <div style="display: flex;justify-content:space-around;align-items:center;margin-top:20px;">
                    <p><a href="register.php" style="color: skyblue;">Create Account ?</a></p>
                    <input class="btn btn-primary" type="submit" name="submit" value="Login">
                </div>

            </form>
        </div>
    </center>
</body>
</html>