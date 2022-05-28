<h1>Login Successful</h1>
<?php
$connection = mysqli_connect('localhost', 'kali','kali');
require 'logupload.php';
upload::uploadlogs($connection);
?>