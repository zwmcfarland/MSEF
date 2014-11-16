<?php
    include("function/Data_Source.php");

    function getProjectInformation($projectID = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT p.*,
                FROM projects
                WHERE 1 = 1";

        if(!empty($projectID) && $projectID != NULL) {
            $sql .= " AND projects.ID = '$projectID'";
        }

        $qryUsers = mysql_query($sql);

        if(mysql_error()) {
            echo "SQL Error: " . mysql_error();
            exit;
        }

        mysql_close();
        return $qryProjects;
    }

    function createProject($userEmail) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "INSERT INTO users (Email)
                VALUES ('$userEmail');";

        $insUser = mysql_query($sql);

        if(mysql_error()) {
            echo "SQL Error: " . mysql_error();
            exit;
        }

        mysql_close();
        return $insUser;
    }
    
    function updateProject($projectId, $Name = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "UPDATE project 
                SET Name = '$Name'
                WHERE Id = $projectID";

        $updProject = mysql_query($sql);

        if(mysql_error()) {
            echo "Failed to update user " . mysql_error();
            exit;
        }

        mysql_close();
        return $updProject;
    }
?>