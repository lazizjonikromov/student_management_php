<?php
error_reporting(0);
session_start();
session_destroy();
if ($_SESSION['message']) {
    $message = $_SESSION['message'];

    echo "<script type='text/javascript'> alert('$message') </script>";
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "select * from teacher";

$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <label class="logo">
            W-School
        </label>
        <ul style="background-color: skyblue;">
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="#admission">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
            <li><a href="register.php" class="btn btn-success">Register</a></li>
        </ul>
    </nav>

    <div class="section1">
        <label class="img_text" for="" style="margin-top: 50px;">We Teach Students With Care</label>
        <img class="main_img" src="school_management.jpg" alt="">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="school2.jpg" class="welcome_img" alt="">
            </div>
            <div class="col-md-8">
                <h1>Welcome To W-School</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit incidunt fuga eveniet enim maxime facilis molestiae aspernatur aliquid non recusandae vel ipsam ut ab adipisci obcaecati asperiores at, atque quaerat.
                    Provident veritatis accusamus explicabo porro vitae reiciendis debitis sapiente tempore. Placeat voluptate sapiente odio assumenda ea blanditiis ut molestiae maxime incidunt dolorum deleniti corrupti, eligendi, magni sequi nemo alias saepe!
                    Quae, beatae ipsam molestias itaque modi quas quaerat illum. Error quisquam, officia itaque obcaecati est aliquam, iure adipisci quibusdam fuga ipsa ducimus minus expedita quidem eius tenetur earum, cum possimus.
                    Neque debitis alias recusandae, quibusdam iusto consectetur distinctio molestias mollitia voluptate, rerum ab, deleniti culpa harum hic delectus quod totam officia. Laborum modi dolorem eum exercitationem a voluptatibus quod repellat.
                </p>
            </div>
        </div>
    </div>

    <center>
        <h1>Our Teachers</h1>
    </center>

    <div class="container">
        <div class="row">
            <?php
            while ($info = $result->fetch_assoc()) {
            ?>
                <div class="col-md-4">
                    <img class="teacher" src="<?php echo "{$info['image']}" ?>" alt="">
                    <h3><?php echo "{$info['name']}" ?></h3>
                    <h5><?php echo "{$info['description']}" ?></h5>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <center>
        <h1>Our Courses</h1>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="web.jpg" alt="">
                <h3>Web Development</h3>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="graphic.jpg" alt="">
                <h3>Graphics Design</h3>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="marketing.png" alt="">
                <h3>Marketing</h3>
            </div>
        </div>
    </div>

    <center>
        <h1 class="adm" id="admission">Admission Form</h1>
    </center>

    <div class="admission_form" align="center">


        <form action="data_check.php" method="post">

            <div class="admin_int">
                <label class="label_text" for="">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>

            <div class="admin_int">
                <label class="label_text" for="">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>

            <div class="admin_int">
                <label class="label_text" for="">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>

            <div class="admin_int">
                <label class="label_text" for="">Message</label>
                <textarea class="input_txt" name="message"></textarea>
            </div>

            <div class="admin_int">
                <input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply">
            </div>

        </form>


    </div>

    <footer>
        <h4 class="footer_text">All @copyright reserved by web devoloper</h4>
    </footer>

</body>

</html>