<?php
    include("function/keywords.php");
    include("function/categories.php");

    /*---- Variables ----*/
    $result = array();
    $categoryId     = $_POST['CategoryId'];
    $categoryName   = $_POST['CategoryName'];
    $description    = $_POST['Description'];
    $keywords    = explode(',', $_POST['Keywords']);

    /* Validation */
    if(empty($categoryName) || $categoryName == NULL) {
        array_push($result, array('Message' => 'An category name is required.', 'Element' => 'CategoryName', 'type' => 'error'));
    }
    if(empty($description) || $description == NULL) {
        array_push($result, array('Message' => 'An category description is required.', 'Element' => 'Description', 'type' => 'error'));
    }
    /* END: Validation */
    if(empty($result))
    {
        /* Do insert */
       updateCategory($categoryId, $categoryName, $description);
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       }
       else {
          deleteCategoryKeywords($categoryId);
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
          array_push($result, array('SuccessURL' => 'browse_categories.php?message=Successfully+Updated+Category', 'type' => 'success'));
       }
    }

    echo json_encode($result);
?>