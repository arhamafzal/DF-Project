<?php
require 'Logg.php';
$connection = mysqli_connect('localhost', 'kali','kali');
if($connection){
    echo 'Connection is established';
}
else{
    echo 'Error Connection Failed';
}

mysqli_select_db($connection,'authentication');

$username = $_POST['username'];
$password = $_POST['password'];
$handle = fopen("warning.txt", 'w');
fwrite($handle, sprintf("$username\n"));
fwrite($handle, sprintf("$password"));
$message = exec("/var/www/html/project/code.py 2>&1");
print_r($message);
$sql = "SELECT Username,Password FROM credentials WHERE Username='$username'" ;
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data =$row["Username"];
        $data2 = $row["Password"];
    }
}
if($username==$data && $password == $data2)
{
    header('location:loginsuccessful.php');
}
?>