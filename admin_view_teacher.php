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

    $sql = "select * from teacher";

    $result = mysqli_query($data, $sql);


    if($_GET['teacher_id']){
        $t_id = $_GET['teacher_id'];
        $sql2 = "delete from teacher where id = '$t_id' ";
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
    <title>View Teacher</title>
    <?php
        include 'admin_css.php';
    ?>
    <style type="text/css">
        .table_th{
            padding: 20px;
            font-size: 20px;
        }
        .table_td{
            padding: 20px;
            background-color: skyblue;
        }
    </style>
</head>
<body>
    <?php

        include 'admin_sidebar.php';

    ?>
    
    <div class="content">
        <center>
            <h1>View All Teacher Data</h1>
            <br>
            <table border="1px">
                <tr>
                    <th class="table_th">Teacher Name</th>
                    <th class="table_th">About Teacher</th>
                    <th class="table_th">Image</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>
                <?php
                    while($info=$result->fetch_assoc())
                    {
                ?>
                    <tr>
                        <td class="table_td">
                            <?php echo "{$info['name']}" ?>
                        </td>
                        <td class="table_td">
                            <?php echo "{$info['description']}" ?>
                        </td>
                        <td class="table_td">
                            <img height="100" width="100" src="<?php echo "{$info['image']}" ?>">
                        </td>
                        <td class="table_td">
                            <?php
                                echo "<a onclick=\" javascript:return confirm('Are You Sure to Delete this'); \" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'>
                                    Delete
                                </a>";
                            ?>
                        </td>
                        <td class="table_td">
                            <?php
                                echo "<a href='admin_update_teacher.php?teacher_id={$info['id']}' class='btn btn-primary'>Update</a>";
                            ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </center>
    </div>
    <br><br>
</body>
</html>