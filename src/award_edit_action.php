<?php
    include("function/keywords.php");
    include("function/awards.php");

    /*---- Variables ----*/
    $result = array();
    $awardId     = $_POST['AwardId'];
    $awardName   = $_POST['AwardName'];
    $description = $_POST['Description'];
    $reward      = $_POST['Reward'];
    $keywords    = explode(',', $_POST['Keywords']);

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
    if(empty($result))
    {
        /* Do insert */
       updateAward($awardId, $awardName, $description, $reward);
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

    echo json_encode($result);
?>