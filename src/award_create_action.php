<?php
    /**
    * Name: Award Create Action
    * Description:
    *     This page is used as the submission page for the award creation. The form on the award create page is submitted to this page.
    * Arguments:
    *     $_POST['AwardName']   - The name of the award being added.
    *     $_POST['Description'] - The description of the award being added.
    *     $_POST['Reward']      - The reward associated to this award.
    *     $_POST['Keywords']    - A list of keywords describing this word.
    * Modifications:
    *     11/09/2014 - Created file.
    *     12/11/2014 - Created Comments.
    */

    /** --- Include Necessary files ---*/
    include("function/keywords.php");
    include("function/awards.php");
    /**--- END: Include Necessary files ---*/

    /**---- Variables ----*/
    $result = array(); ///$result will be used to keep track of validation errors.
    $awardName   = $_POST['AwardName'];
    $description = $_POST['Description'];
    $reward      = $_POST['Reward'];
    $keywords    = explode(',', $_POST['Keywords']);
    /**---- END: Variables ----*/

    /** Validation */
    if(empty($awardName) || $awardName == NULL) {
        array_push($result, array('Message' => 'An award name is required.', 'Element' => 'AwardName', 'type' => 'error'));
    }
    if(empty($description) || $description == NULL) {
        array_push($result, array('Message' => 'An award description is required.', 'Element' => 'Description', 'type' => 'error'));
    }
    if(empty($reward) || $reward == NULL) {
        array_push($result, array('Message' => 'A award reward description is required.', 'Element' => 'AwardName', 'type' => 'error'));
    }
    /** END: Validation */
    
    ///If it passed validation continue.
    if(empty($result))
    {
       /// Insert the award into the database
       $awardId = createAward($awardName, $description, $reward); 
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       }
       else {
              foreach($keywords as $keyword) {
                  ///Insert keyword
                  ///If the keyword is already in the database, just associate, otherwise insert then associate.
                  if(is_numeric($keyword)) {
                      $newKeywordId = $keyword;
                  }
                  else {
                      $newKeywordId = insertKeyword($keyword);
                  }
                  associateKeyword($awardId, $newKeywordId);
              }
              array_push($result, array('SuccessURL' => 'award_detail.php?awardId=' . $awardId . '&message=Successfully+Created+Award', 'type' => 'success'));
       }
    }

    ///Return the results array, in json format.
    echo json_encode($result);
?>