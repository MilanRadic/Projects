<?php
    $sname = "localhost";
    $uname = "mradic";
    $password = "Ghf563xcvg32D";
    $db_name = "mradic";

    $conn = mysqli_connect('localhost', 'mradic', 'Ghf563xcvg32D', 'mradic');

    if(!$conn){
        echo "Connection faild!";
    }
?>