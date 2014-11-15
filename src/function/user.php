<?php
    include("function/Data_Source.php");

    function getUserInformation($userEmail = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT u.Id AS UserId,
                       p.Id AS ProjectId,
                       u.*,
                       p.*
                FROM users as u
                     LEFT OUTER JOIN studentProjects AS sp ON u.Id = sp.student_id
                     LEFT OUTER JOIN projects AS p ON sp.project_id = p.Id
                     LEFT OUTER JOIN login.users AS lu ON u.Email = lu.user_email
                WHERE 1 = 1";

        if(!empty($userEmail) && $userEmail != NULL) {
            $sql .= " AND lu.user_email = '$userEmail'";
        }

        $qryUsers = mysql_query($sql);

        if(mysql_error()) {
            echo "SQL Error: " . mysql_error();
            exit;
        }

        mysql_close();
        return $qryUsers;
    }
?>