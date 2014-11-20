<?php
    include("function/Data_Source.php");

    function getProjectInformationByProjectId($projectID = "") {
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
	
	function getProjectInformationByEmail($userEmail = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT projects.*,
        		statuses.name as statusName
        		From projects
        			LEFT OUTER JOIN studentProjects AS sp ON projects.Id = sp.project_id
        			LEFT OUTER JOIN users AS u ON sp.student_id = u.Id
        			LEFT OUTER JOIN login.users AS lu ON u.Email = lu.user_email
                	INNER JOIN statuses on projects.status_id = statuses.Id
                WHERE 1 = 1";

        if(!empty($userEmail) && $userEmail != NULL) {
            $sql .= " AND lu.user_email = '$userEmail'";
        }

        $qryProjects = mysql_query($sql);

        if(mysql_error()) {
            echo "SQL Error: " . mysql_error();
            exit;
        }

        mysql_close();
        return $qryProjects;
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
	
	function createProject($Name = "", $Description="", $Abstract ="", $Electrical=FALSE,$User_id="") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "Insert into projects (Name,Description,Abstract,Electrical, status_id)
        		(Select '$Name', '$Description', '$Abstract', '$Electrical', statuses.Id from 
        		statuses where statuses.Name = 'Not Submitted')";

        $updProject = mysql_query($sql);
		
		$id = mysql_insert_id();
		
		$sql = "Insert into studentProjects (student_id,project_id) values ('$User_id','$id')";
		//$sql = "Insert into studentProjects (student_id,project_id) values ('2','$id')";
		
		$updProject = mysql_query($sql);

        return $id;
    }
	
	function validate($Name, $Description, $Abstract, $Electrical, $user_id){
		$result = array();
		if(empty($Name) || $Name == NULL) {
       		array_push($result, array('Message' => 'A project name is required.', 'Element' => 'ProjectName', 'type' => 'error'));
    	}
		if(empty($Description) || $Description == NULL) {
       		array_push($result, array('Message' => 'A description is required.', 'Element' => 'Description', 'type' => 'error'));
    	}
		if(empty($Abstract) || $Abstract == NULL) {
       		array_push($result, array('Message' => 'An abstract is required.', 'Element' => 'Abstract', 'type' => 'error'));
    	}
		return $result;
	}
	
?>