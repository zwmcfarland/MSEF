<?php
    include("function/categories.php");
    include("function/keywords.php");
    date_default_timezone_set('UTC');
    /*---- Variables ----*/
    $result            = array();
    $categoryName      = $_POST['CategoryName'];
    $description       = $_POST['Description'];
    $keywords    = explode(',', $_POST['Keywords']);

    /* Validation */
    if(empty($categoryName) && $categoryName != NULL) {
        array_push($result, array('Message' => 'A category is required.', 'Element' => 'CategoryName', 'type' => 'error'));
    }
    if(empty($description) && $description != NULL) {
        array_push($result, array('Message' => 'A description is required.', 'Element' => 'Description', 'type' => 'error'));
    }
    /* END: Validation */

    if(empty($result))
    {
        /* Do insert */
       $categoryId = createCategory($categoryName, $description);
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       }
       else {
            foreach($keywords as $keyword) {
                //Insert keyword
                if(property_exists($keyword, 'Id')) {
                    $newKeywordId = $keyword.Id;
                }
                else {
                    $newKeywordId = insertKeyword($keyword);
                }
                associateKeyword($categoryId, $newKeywordId);
            }
            array_push($result, array('SuccessURL' => 'browse_categories.php?message=Successfully+Created+Category', 'type' => 'success'));
        }
    }

    echo json_encode($result);
?>