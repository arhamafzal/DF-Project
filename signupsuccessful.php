<h1>Sign up successful</h1>
<?php
$connection = mysqli_connect('localhost', 'kali','kali');
require 'logupload.php';
upload::uploadlogs($connection);

?>