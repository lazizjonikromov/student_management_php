<?php

    session_start();
    error_reporting(0);
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='student'){
        header("location:login.php");
    }


    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolproject";

    $data = mysqli_connect($host, $user, $password, $db);

    $sql = "select * from admission";

    $result = mysqli_query($data, $sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission</title>
    <?php
        include 'admin_css.php';
    ?>
</head>
<body>
    <?php

        include 'admin_sidebar.php';

    ?>

    <div class="content">
        <center>
            <h1>Applied For Admission</h1>

            <?php

                if($_SESSION['message'])
                {
                    echo $_SESSION['message'];
                }

            ?>

            <br>

            <table border="1px">
                <tr>
                    <th style="padding: 20px;font-size: 15px;">Name</th>
                    <th style="padding: 20px;font-size: 15px;">Email</th>
                    <th style="padding: 20px;font-size: 15px;">Phone</th>
                    <th style="padding: 20px;font-size: 15px;">Message</th>
                </tr>
                <?php
                    while($info=$result->fetch_assoc())
                    {
                ?>
                    <tr style="background-color: skyblue;">
                        <td style="padding: 20px;">
                            <?php echo "{$info['name']}"; ?>
                        </td>
                        <td style="padding: 20px;">
                            <?php echo "{$info['email']}"; ?>
                        </td>
                        <td style="padding: 20px;">
                            <?php echo "{$info['phone']}"; ?>
                        </td>
                        <td style="padding: 20px;">
                            <?php echo "{$info['message']}"; ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </center>
    </div>
</body>
</html>