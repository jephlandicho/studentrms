<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school_db";
    $con = mysqli_connect($server,$username,$password,$dbname);
    if(!$con)
    {
        die('Cannot connect'.mysqli_error());
    }

?>