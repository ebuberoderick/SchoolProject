<?php
    $hostname = "localhost";
    $server_username = "root";
    $server_password = "";
    $database = "claret";
    $pcon = mysqli_connect($hostname, $server_username, $server_password, $database);
    $ocon = new mysqli($hostname, $server_username, $server_password, $database);
?>