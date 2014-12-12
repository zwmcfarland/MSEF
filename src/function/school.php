<?php
	//Get school records from the datbase
    function getSchools($schoolId = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT * FROM schools AS s WHERE 1 = 1";

        if(!empty($schoolId) && $schoolId != NULL) {
            $sql .= " AND s.Id = $schoolId";
        }

        $qrySchools = mysql_query($sql);

        if(mysql_error()) {
            echo "SQL Error: " . mysql_error();
            exit;
        }

        mysql_close();
        return $qrySchools;
    }
?>