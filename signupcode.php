<?php
    $connection = mysqli_connect('localhost', 'kali','kali');
    if($connection){
        echo 'Connection is established';
    }
    else{
        echo 'Error Connection Failed';
    }
mysqli_select_db($connection,'authentication');
$username= $_POST['username'];
$password = $_POST['password'];

$data = "INSERT INTO credentials (Username,Password) VALUES ('$username','$password')";

mysqli_query($connection, $data);
header('location:signupsuccessful.php')
?>