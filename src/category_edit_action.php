<?php
    /**
     * Name: Category edit
     * Description:
     *     This page allows staff members to edit existing categories.
     * Arguments:
     *     $_POST['CategoryId']   - Id of the category being edited
     *     $_POST['CategoryName'] - Updated name of the category
     *     $_POST['Description']  - Updated description of the category
     *     $_POST['Keywords']     - Updated list of keywords
     * Modifications:
     *     11/09/2014 - Created file.
     *     12/12/2014 - Created Comments.
     */

	///Include necessary files.
    include("function/keywords.php");
    include("function/categories.php");

    /**---- Variables ----*/
    $result = array();
    $categoryId     = $_POST['CategoryId'];
    $categoryName   = $_POST['CategoryName'];
    $description    = $_POST['Description'];
    $keywords    = explode(',', $_POST['Keywords']);
	/**--- END: Variables ---*/

    /** Validation */
    if(empty($categoryName) || $categoryName == NULL) {
        array_push($result, array('Message' => 'An category name is required.', 'Element' => 'CategoryName', 'type' => 'error'));
    }
    if(empty($description) || $description == NULL) {
        array_push($result, array('Message' => 'An category description is required.', 'Element' => 'Description', 'type' => 'error'));
    }
    /** END: Validation */
    
    ///If passed validation.
    if(empty($result))
    {
        /// Update category
       updateCategory($categoryId, $categoryName, $description);
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       }
       else {
       	  ///Un associate keywords
          deleteCategoryKeywords($categoryId);
          foreach($keywords as $keyword) {
              ///if pre-existing, associate, else insert then associate.
              if(is_numeric($keyword)) {
                  $newKeywordId = $keyword;
              }
              else {
                  $newKeywordId = insertKeyword($keyword);
              }
              associateKeyword($categoryId, $newKeywordId);
          }
          array_push($result, array('SuccessURL' => 'browse_categories.php?message=Successfully+Updated+Category', 'type' => 'success'));
       }
    }

    ///Return results array in json format.
    echo json_encode($result);
?>