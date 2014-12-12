<?php
    /*
    * Name: Award edit action
    * Description:
    *     This page is used as the submission page for the award edit page. The form on the award edit page is submitted to this page.
    * Arguments:
    *     $_POST['AwardId']     - The id of the award being edited.
    *     $_POST['AwardName']   - The name of the award being edited.
    *     $_POST['Description'] - The description of the award being edited.
    *     $_POST['Reward']      - The reward associated to this award.
    *     $_POST['Keywords']    - A list of keywords describing this award.
    * Modifications:
    *     11/09/2014 - Created file.
    *     12/11/2014 - Created Comments.
    */

    /* --- Include neccesarry files ---*/
    include("function/keywords.php");
    include("function/awards.php");
    /* --- END: Include neccesarry files ---*/

    /*---- Variables ----*/
    $result = array();
    $awardId     = $_POST['AwardId'];
    $awardName   = $_POST['AwardName'];
    $description = $_POST['Description'];
    $reward      = $_POST['Reward'];
    $keywords    = explode(',', $_POST['Keywords']);
    /*--- END: variables ---
    
    /* Validation */
    if(empty($awardName) || $awardName == NULL) {
        array_push($result, array('Message' => 'An award name is required.', 'Element' => 'AwardName', 'type' => 'error'));
    }
    if(empty($description) || $description == NULL) {
        array_push($result, array('Message' => 'An award description is required.', 'Element' => 'Description', 'type' => 'error'));
    }
    if(empty($reward) || $reward == NULL) {
        array_push($result, array('Message' => 'A award reward description is required.', 'Element' => 'AwardName', 'type' => 'error'));
    }
    /* END: Validation */
    
    //If validation past.
    if(empty($result))
    {
        /* Update award */
       updateAward($awardId, $awardName, $description, $reward);
       
       //If there where no errors, continue, else return error message.
       if(mysql_error()){
           array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
       }
       else {
          deleteAwardKeywords($awardId);
          foreach($keywords as $keyword) {
              //Insert keyword
              if(is_numeric($keyword)) {
                  $newKeywordId = $keyword;
              }
              else {
                  $newKeywordId = insertKeyword($keyword);
              }
              associateKeyword($awardId, $newKeywordId);
          }
          array_push($result, array('SuccessURL' => 'award_detail.php?awardId=' . $awardId . '&message=Successfully+Updated+Award', 'type' => 'success'));
       }
    }

    //return results array.
    echo json_encode($result);
?>