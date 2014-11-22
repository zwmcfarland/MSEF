<?php
    function updateEvent($eventId, $eventName, $startDate, $endDate, $description, $location) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "UPDATE events
                SET name = '$eventName',
                    StartDate = '$startDate',
                    EndDate = '$endDate',
                    Description = '$description',
                    Location = '$location'
                WHERE Id = $eventId";

         mysql_query($sql);
    }

    function createEvent($eventName,$startDate,$endDate,$desctiption, $location) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "Insert into events (Name,StartDate,EndDate,Description,Location)
                (Select '$eventName', '$startDate', '$endDate', '$desctiption','$location')";

        mysql_query($sql);
        return mysql_insert_id();
    }
    
    function validate($eventName = "",$startDate = "",$endDate = "",$desctiption = "", $location = ""){
        $result = array();
        return $result;
    }

    function getEvents($eventId = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT Id, Name, StartDate, EndDate, Description, Location
                FROM events
                WHERE 1 = 1 ";

        if($eventId != "") {
            $sql .= "AND Id = $eventId";
        }

        $sql .= " ORDER BY StartDate";

        $qryEvents = mysql_query($sql);
        return $qryEvents;
    }

?>