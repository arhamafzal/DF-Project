<?php
$connection = mysqli_connect('localhost', 'kali','kali');
require 'logupload.php';
upload::uploadlogs($connection);
echo $_SERVER['HTTP_REFERER'];
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>