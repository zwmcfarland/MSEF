<?php
    /*
     * Name: Category Create Action
     * Description:
     *     This page is a system page used as the action for the category_create form.
     * Arguments:
     *     $_POST['CategoryName'] - Name of the new category.
     *     $_POST['Description']  - Description of the new category
     *     $_POST['Keywords']     - Keywords that describe this category.
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

    //Include necessary files.
    include("function/categories.php");
    include("function/keywords.php");
    date_default_timezone_set('UTC');

    /*---- Variables ----*/
    $result            = array();
    $categoryName      = $_POST['CategoryName'];
    $description       = $_POST['Description'];
    $keywords    = explode(',', $_POST['Keywords']);
    /*--- END: Variables -- */

    /* Validation */
    if(empty($categoryName) && $categoryName != NULL) {
        array_push($result, array('Message' => 'A category is required.', 'Element' => 'CategoryName', 'type' => 'error'));
    }
    if(empty($description) && $description != NULL) {
        array_push($result, array('Message' => 'A description is required.', 'Element' => 'Description', 'type' => 'error'));
    }
    /* END: Validation */

    //If validation passed.
    if(empty($result))
    {
        //Insert new category into database.
       $categoryId = createCategory($categoryName, $description);
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       }
       else {
            foreach($keywords as $keyword) {
                //Insert keyword
                if(is_numeric($keyword)) {
                    $newKeywordId = $keyword;
                }
                else {
                    $newKeywordId = insertKeyword($keyword);
                }
                associateKeyword($categoryId, $newKeywordId);
            }
            array_push($result, array('SuccessURL' => 'browse_categories.php?message=Successfully+Created+Category', 'type' => 'success'));
        }
    }

    //Return results array, in json format.
    echo json_encode($result);
?>