<?php
	///gets category infromation from the database.
    function getCategories($categoryId = "") {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "SELECT c.Id,
                       c.Name,
                       c.Description
                FROM categories AS c
                WHERE 1 = 1 ";
        if(!empty($categoryId) && $categoryId != NULL) {
            $sql .= " AND c.Id = $categoryId";
        }

        return mysql_query($sql);
    }

    ///Creates a category record in the database.
    function createCategory($categoryName, $description) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());

        $sql = "INSERT INTO categories (Name, Description)
                VALUES ('$categoryName','$description')";

        mysql_query($sql);
        return mysql_insert_id();
    }

    ///Associaties a keyword to a category
    function associateKeyword($categoryId, $keywordId) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
    
        $sql = "INSERT INTO categoryKeywords  (category_id, keyword_id)
                VALUES ($categoryId,$keywordId)";
    
        mysql_query($sql);
    }

    ///Dis-associates all keywords from a category.
    function deleteCategoryKeywords ($categoryId) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
    
        $sql = "DELETE FROM categoryKeywords WHERE category_id = $categoryId";
    
        mysql_query($sql);
    }

    ///Updates category records details.
    function updateCategory($categoryId, $categoryName, $description) {
        include("Data_Source.php");
        mysql_connect("$host", "$username", "$password")or die("Cannot connect to server " . mysql_error());
        mysql_select_db("$db_name")or die("Cannot select DB " . mysql_error());
    
        $sql = "UPDATE categories
        SET Name = '$categoryName', Description = '$description'
        WHERE Id = $categoryId";
    
        mysql_query($sql);
    }
?>