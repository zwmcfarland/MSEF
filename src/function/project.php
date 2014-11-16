<?php
    include("function/Data_Source.php");

    function getProjectInformation($projectID = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT projects.*,
        		statuses.name as statusName
                FROM projects
                INNER JOIN statuses on projects.status_id = statuses.Id
                WHERE 1 = 1";

        if(!empty($projectID) && $projectID != NULL) {
            $sql .= " AND projects.Id = '$projectID'";
        }

        $qryProjects = mysql_query($sql);

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
    
    function updateProject($projectId, $Name = "", $Description="", $Abstract ="", $Electrical=FALSE) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "UPDATE projects
                SET Name = '$Name', Description = '$Description', Abstract = '$Abstract', Electrical = '$Electrical'
                WHERE Id = $projectId";

        $updProject = mysql_query($sql);

        mysql_close();
        return $updProject;
    }
?>