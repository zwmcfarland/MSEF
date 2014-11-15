<?php
    include("function/Data_Source.php");

    function getUserInformation($userEmail = "") {
        $conn = getConnection();
        $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE Email = :userEmail");
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);

        return $stmt;
    }
?>