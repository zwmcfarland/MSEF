<?php
	///Gets information about MSEF awards from the database.
    function getAward($awardId = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT Id, Name, Description, Reward
                FROM awards
                WHERE 1 = 1 ";

         if($awardId != "") {
             $sql .= "AND Id = $awardId";
         }

         $qryAward = mysql_query($sql);
         return $qryAward;
    }

    ///Associatesa a keyword to an award.
    function associateKeyword($awardId, $keywordId) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "INSERT INTO awardKeywords (award_id, keyword_id)
                VALUES ($awardId,$keywordId)";

        mysql_query($sql);
    }

    ///Disassociates all keywords from an award.
    function deleteAwardKeywords ($awardId) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
        
        $sql = "DELETE FROM awardKeywords WHERE award_id = $awardId";
        
        mysql_query($sql);
    }

    ///Inserts award record into database,
    function createAward($awardName, $description, $reward) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
        
        $sql = "INSERT INTO awards (Name, Description, Reward)
                VALUES ('$awardName', '$description','$reward')";
        
        mysql_query($sql);
        
        return mysql_insert_id();
    }

    ///Updates award record in the database.
    function updateAward($awardId, $awardName, $description, $reward) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
    
        $sql = "UPDATE awards 
                SET Name = '$awardName', Description = '$description', Reward = '$reward'
                WHERE Id = $awardId";
    
        mysql_query($sql);
    }

    ///Gets a list of suggested projects to give the award too.
    function getSuggestedProjects($awardId = "") {
        include("Data_Source.php");
        include_once("project.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        ///Get a list of keywords for the award.
        $sql = "SELECT k.keyword
                FROM awardKeywords as ak
                     LEFT OUTER JOIN keywords AS k ON ak.keyword_id = k.Id
                WHERE ak.award_id = $awardId";
        
        $qryKeywords = mysql_query($sql);

        ///check for projects associated to those keywords
        $sql = "SELECT p.*,
                       MATCH(Name, Description, Abstract) AGAINST ('";
                       while($row = mysql_fetch_assoc($qryKeywords)) {
                           $sql .= $row['keyword'] . ' ';
                       }
                       $sql .= "' IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION) AS MatchRating ";
        $sql .= "FROM projects as p
                WHERE MATCH(Name, Description, Abstract) AGAINST ('";
                while($row = mysql_fetch_assoc($qryKeywords)) {
                    $sql .= $row['keyword'] . ' ';
                }
        $sql .= "' IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION)";
        return mysql_query($sql);
    }
?>