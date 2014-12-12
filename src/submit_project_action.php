<?php
    include("function/project.php");

    /*---- Variables ----*/
    $result = array();
    $ProjectId        = $_POST['ProjectId'];
    $sponsorId        = $_POST['Sponsor'];

    
    submitProject($ProjectId,$sponsorId);
    if(mysql_error()){
        array_push($result, array('Message' => mysql_error(), 'type' => 'error'));
    } else {
        array_push($result, array('SuccessURL' => 'user_profile_detail.php?message=Successfully+Submitted+Project', 'type' => 'success'));
    }
    
    echo json_encode($result);
?>