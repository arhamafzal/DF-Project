<?php
class upload
{
    public static function uploadlogs($connection)
    {
        $pog = 0;
        $handle = fopen("/var/log/apache2/modsec_audit.log", "r");
        if ($handle)
        {
            while (($line = fgets($handle)) !== false) {
                if(strpos($line, "GET") !== false || strpos($line, "POST") !== false){
                    $url = $line;
                    $pog++;
                }
                if(strpos($line, "HOST") !== false){
                    $host = $line;
                    $pog++;
                }
                if(strpos($line, "User-Agent") !== false){
                    $pog++;
                    $useragent = $line;
                }
                if(strpos($line, "[") !== false){
                    $pog++;
                    $date = $line;
                }
                if(strpos($line, "username") !== false){
                    $pog++;
                    $data = $line;
                }
            }
        }
        mysqli_select_db($connection,'authentication');
        mysqli_query($connection, "INSERT INTO log(url,host,useragent,date,data) VALUES ('$url','$host','$useragent','$date','$data')");
        fclose($handle);
    }
}

?>