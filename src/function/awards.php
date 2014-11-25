<?php
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

    function associateKeyword($awardId, $keywordId) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "INSERT INTO awardKeywords (award_id, keyword_id)
                VALUES ($awardId,$keywordId)";

        mysql_query($sql);
    }

    function deleteAwardKeywords ($awardId) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
        
        $sql = "DELETE FROM awardKeywords WHERE award_id = $awardId";
        
        mysql_query($sql);
    }
    function createAward($awardName, $description, $reward) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
        
        $sql = "INSERT INTO awards (Name, Description, Reward)
                VALUES ('$awardName', '$description','$reward')";
        
        mysql_query($sql);
        
        return mysql_insert_id();
    }

    function updateAward($awardId, $awardName, $description, $reward) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
    
        $sql = "UPDATE awards 
                SET Name = '$awardName', Description = '$description', Reward = '$reward'
                WHERE Id = $awardId";
    
        mysql_query($sql);
    }

    
?>