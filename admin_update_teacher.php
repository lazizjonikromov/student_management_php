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
    $t_id = $_GET['teacher_id'];


    if($_GET['teacher_id']){
        $t_id = $_GET['teacher_id'];
        $sql = "select * from teacher where id='$t_id' ";
        $result = mysqli_query($data, $sql);
        $info = $result->fetch_assoc();
    }

    if(isset($_POST['update_teacher'])){
        $t_name = $_POST['name'];
        $t_des = $_POST['description'];

        $file = $_FILES['image']['name'];
        $dst = "./image/".$file;
        $dst_db = "image/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'], $dst);

        if($file){
            $sql2 = "update teacher set name='$t_name', description='$t_des', image='$dst_db' 
            where id='$t_id' ";     
        }
        else{
            $sql2 = "update teacher set name='$t_name', description='$t_des' 
            where id='$t_id' ";    
        }
        

        $result2 = mysqli_query($data, $sql2);

        if($result2){
            header("location:admin_view_teacher.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher</title>
    <?php
        include 'admin_css.php';
    ?>
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 150px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .form_deg{
            background-color: skyblue;
            width: 600px;
            padding: 70px 0;
        }
    </style>
</head>
<body>
    <?php

        include 'admin_sidebar.php';

    ?>
    
    <div class="content">
        <center>
            <h1>Update Teacher Data</h1>
            <br>
            <form class="form_deg" action="#" method="post" enctype="multipart/form-data">
                <div>
                    <label for="">Teacher Name</label>
                    <input type="text" name="name" value="<?php echo "{$info['name']}" ?>">
                </div>
                <div>
                    <label for="">About teacher</label>
                    <textarea name="description" rows="4"><?php echo "{$info['description']}" ?></textarea>
                </div>
                <div>
                    <label for="">Teacher old Image</label>
                    <img width="100" height="100" src="<?php echo "{$info['image']}" ?>" alt="">
                </div>
                <div>
                    <label for="">Choose Teacher New Image</label>
                    <input type="file" name="image">
                </div>
                <br>
                <div>
                    <input type="submit" name="update_teacher" class="btn btn-success">
                </div>
            </form>
        </center>
        <br>
    </div>
</body>
</html>