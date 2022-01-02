<?php 

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if($data===false){
    die("connection error");
}

if(isset($_POST['apply']))
{
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $data_name = validate($_POST['name']);
    $data_email = validate($_POST['email']);
    $data_phone = validate($_POST['phone']);
    $data_message = validate($_POST['message']);

    $sql="insert into admission(name,email,phone,message) values('$data_name','$data_email','$data_phone','$data_message')";

    $result=mysqli_query($data,$sql);   

    if($result)
    {
        $_SESSION['message']="your aplication sent successful";
        header("location:index.php");
    }
    else
    {
        echo "Apply Failed";
    }


}











?>