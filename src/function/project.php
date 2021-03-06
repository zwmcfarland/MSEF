<?php
	/*Gets project record information from the database*/
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

    /*Gets project record information from the database */
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

    ///Upates project record details in the database.
    function updateProject($projectId, $Name = "", $Description="", $Abstract ="", $Electrical=FALSE) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $Name = mysql_escape_string($Name);
        $Description = mysql_escape_string($Description);
        $Abstract = mysql_escape_string($Abstract);

        $sql = "UPDATE projects
                SET Name = '$Name', Description = '$Description', Abstract = '$Abstract', Electrical = '$Electrical'
                WHERE Id = $projectId";

        $updProject = mysql_query($sql);

        return $updProject;
    }

    ///creates a project record in the database.
    function createProject($Name, $Description, $Abstract,$User_id, $Electrical=FALSE) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $Name = mysql_escape_string($Name);
        $Description = mysql_escape_string($Description);
        $Abstract = mysql_escape_string($Abstract);

        $sql = "INSERT INTO projects (Name,Description,Abstract,Electrical, status_id)
                (SELECT '$Name', '$Description', '$Abstract', '$Electrical', statuses.Id 
                 FROM statuses 
                 WHERE statuses.Name = 'Not Submitted')";

        mysql_query($sql);

        return mysql_insert_id();
    }

    ///Validates a project.
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

    ///Get all of the projects that a user is elegible to sign up for.
    function getschoolProjects($userId) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT projectId,projectname,projectDescription, numMembers
                FROM (
                       SELECT p.id AS projectId,
                              p.Name AS projectName,
                              p.description AS projectDescription,
                              u.school_id,
                              COUNT(sp.student_id) AS numMembers
                       FROM projects as p
                            LEFT OUTER JOIN studentProjects as sp ON p.Id = sp.project_id
                            LEFT OUTER JOIN users as u on sp.student_id = u.Id
                      ) as Projects
                WHERE school_id IN (SELECT school_id from users WHERE id = $userId)";
        
        $qryProjects = mysql_query($sql);

        return $qryProjects;
    }

    ///Assign a user to a particular project
    function signUp($studentId, $projectId) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "INSERT INTO studentProjects (student_id,project_id) values ($studentId,$projectId)";
        
        $updProject = mysql_query($sql);
    }

    ///Submit a project to be approved.
    function submitProject($ProjectId,$sponsorId) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
        
        $sql = "INSERT INTO sponsorProjects (project_id,sponosr_id)
                VALUES($ProjectId, $sponsorId)";
        mysql_query($sql);
        if(mysql_error()) {
            return;
        }
        $sql = "UPDATE projects set status_id = 2 WHERE Id = $ProjectId";
        mysql_query($sql);
    }

    ///Get a list of approvals pending a users signoff
    function getMyApprovals($email) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
        
        $sql = "SELECT *
                FROM projects
                WHERE status_id = 2 AND Id IN (SELECT sp.project_id
                                               FROM sponsorProjects as sp
                                                    INNER JOIN users as u on sp.sponosr_id = u.id
                                                WHERE u.Email = '$email')";
        return mysql_query($sql);
    }

    ///Get a list of users assigned to a project
    function getProjectMembers($projectId) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
        
        $sql = "SELECT *
                FROM users
                WHERE Id IN (SELECT student_id
                            FROM studentProjects
                            WHERE project_id = $projectId)";
        return mysql_query($sql);
    }

    ///Approve a project
    function approveProject($project_id, $status) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "UPDATE projects SET status_id = $status WHERE Id = $project_id";
        mysql_query($sql);
    }
    
    ///Smart algorithim to get suggested projects for each category.
    function getSuggestedProjectCategories() {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        ///Get Keywords for each category
        $sql = "SELECT ck.category_id, k.keyword
        		FROM keywords as k
        			 INNER JOIN categoryKeywords AS ck ON k.Id = ck.keyword_id";

        $fancyKeywordStruct = "";
        $fancyProjectStruct = "";
        $qryKeywords = mysql_query($sql);
        while($row = mysql_fetch_assoc($qryKeywords)) {
            if(!isset($fancyKeywordStruct[$row['category_id']])) {
            	$fancyKeywordStruct[$row['category_id']] = array();
            }
            if(!isset($fancyProjectStruct[$row['category_id']])) {
            	$fancyProjectStruct[$row['category_id']] = array();
            }
            array_push($fancyKeywordStruct[$row['category_id']],$row['keyword']);
        }

        ///check for projects associated to those keywords
		foreach($fancyKeywordStruct as $category => $keywordList) {
			$sql = "SELECT p.*,
                       MATCH(Name, Description, Abstract) AGAINST ('";
						foreach($keywordList as $keyword) {
							$sql .= $keyword . ' ';
						}
			$sql .= "' IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION) AS MatchRating ";
			$sql .= "FROM projects as p
                	WHERE MATCH(Name, Description, Abstract) AGAINST ('";
						foreach($keywordList as $keyword) {
							$sql .= $keyword . ' ';
						}
			$sql .= "' IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION)";

			$qryProjects = mysql_query($sql);
			while($row = mysql_fetch_assoc($qryProjects)) {
				array_push($fancyProjectStruct[$category], ["project_id" => $row['Id'], "project_name" => $row['Name'], "MatchRating" => $row['MatchRating']]);
			}
		}
		return $fancyProjectStruct;
    }
?>