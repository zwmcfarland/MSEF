<?php
    include("function/Data_Source.php");
	function updateEvent($projectId, $Name = "", $Description="", $Abstract ="", $Electrical=FALSE) {
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
	
	function createEvent($eventName = "",$startDate = "",$endDate = "",$desctiption = "", $location = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "Insert into events (Name,StartDate,EndDate,Description,Location)
        		(Select '$eventName', '$startDate', '$endDate', '$desctiption','$location')";

        $updEvent = mysql_query($sql);
    }
    
    function validate($eventName = "",$startDate = "",$endDate = "",$desctiption = "", $location = ""){
		$result = array();
		return $result;
	}
	
?>