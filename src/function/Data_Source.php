<?php
    function getConnection() {
        $host       ="localhost"; // Host name
        $username   ="msef_app_id"; // Mysql username
        $password   ="MetroOmahaScienceFair";
        $db_name    ="MSEF"; // Database name
        $connection = mysqli_connect($host,$username,$password,$db_name);
        
        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        return $connection;
    }
?>
