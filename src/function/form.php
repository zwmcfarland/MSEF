<?php
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
                WHERE 1 = 1";

        if(!empty($userId) && $userId != NULL) {
            $sql .= " AND s.student_id = $userId";
        }
        
        $qryForms = mysql_query($sql);
        
        if(mysql_error()) {
            echo "Error getting forms: " . mysql_error();
        }
        
        return $qryForms;
    } 
?>