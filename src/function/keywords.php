<?php
	///Gets keyword records from the database.
    function getKeywords() {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT Id, Keyword
                FROM keywords";

        $qryKeywords = mysql_query($sql);

        mysql_close();
        return $qryKeywords;
    }
    
    ///Inserts a new keyword into the database.
    function insertKeyword($keyword) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
        
        $sql = "INSERT INTO keywords (Keyword)
                VALUES ('$keyword')";

        mysql_query($sql);
        
        return mysql_insert_id();
    }

    ///Gets keywords associated to a particular award
    function getAwardKeywords($awardId = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
    
        $sql = "SELECT k.Id,k.keyword
                FROM awardKeywords AS ak
                     LEFT OUTER JOIN keywords AS k on ak.keyword_id = k.Id
                WHERE 1 = 1";
    
        if($awardId != "") {
            $sql .= " AND ak.award_id = $awardId";
        }
    
        $qryKeywords = mysql_query($sql);
        return $qryKeywords;
    }

    ///Gets keywords associated to a particular category
    function getCategoryKeywords($categoryId = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
    
        $sql = "SELECT k.Id,k.keyword
                FROM categoryKeywords AS ak
                     LEFT OUTER JOIN keywords AS k on ak.keyword_id = k.Id
                WHERE 1 = 1";
    
        if($categoryId != "") {
            $sql .= " AND ak.category_id = $categoryId";
        }
    
        $qryKeywords = mysql_query($sql);
        return $qryKeywords;
    }
?>