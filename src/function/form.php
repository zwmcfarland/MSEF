<?php
	//Gets forms that are required to be filled out by students.
    function getStudentForms($userId = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT sf.form_id,
                       sf.status_id,
                       f.Name AS FormName,
                       f.FormPath,
                       s.Name as StatusName,
                       s.Description

                FROM studentForms AS sf
                     LEFT OUTER JOIN forms AS f ON sf.form_id = f.Id
                     LEFT OUTER JOIN statuses AS s ON sf.status_id = s.Id
                WHERE 1 = 1 ";

        if(!empty($userId) && $userId != NULL) {
            $sql .= " AND sf.student_id = '$userId'";
        }
        
        $qryForms = mysql_query($sql);
        
        if(mysql_error()) {
            echo "Error getting forms: " . mysql_error();
        }
        
        return $qryForms;
    }

    //Gets form records from the database.
    function getForms($formId = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
        
        $sql = "SELECT Id, Name, FormPath
                FROM forms
                WHERE 1 = 1 ";

        if($formId != "") {
            $sql .= " AND Id = $formId";
        }

        $qryForms = mysql_query($sql);
        return $qryForms;
    }

    //Associates keywords to a form.
    function associateKeyword($formId, $keywordId) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
    
        $sql = "INSERT INTO formKeywords (form_id, keyword_id)
        VALUES ($formId,$keywordId)";
    
        mysql_query($sql);
    }
    
    //Creates a form record in the database.
    function createForm($formName, $formPath) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
        
        $sql = "INSERT INTO forms (Name, FormPath)
                VALUES ('$formName','$formPath')";
        
        mysql_query($sql);
        return mysql_insert_id();
    }

    //Gets a list of suggested forms for a paticular project.
    function getSuggestedForms($projectId) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT * FROM forms";
        $qryForms = mysql_query($sql);
        $suggestedForms = array();

        while($row = mysql_fetch_assoc($qryForms)){
            $sql = "SELECT k.keyword
                    FROM formKeywords AS fk
                         LEFT OUTER JOIN keywords AS k ON fk.keyword_id = k.Id
                    WHERE fk.form_id = " . $row['Id'];

            $qryKeywords = mysql_query($sql);
            
            $sql = "SELECT p.Id 
                    FROM projects as p
                    WHERE MATCH(Name, Description, Abstract) AGAINST ('";
            while($keys = mysql_fetch_assoc($qryKeywords)) {
                $sql .= $keys['keyword'] . ' ';
            }
            $sql .= "' IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION) AND p.Id = $projectId";
            
            if(mysql_num_rows(mysql_query($sql)) == 1) {
                array_push($suggestedForms, array('Id' => $row['Id'], 'Name' => $row['Name']));
            }
        }
        return $suggestedForms;
    }
?>